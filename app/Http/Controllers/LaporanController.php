<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditLaporanRequest;
use App\Http\Requests\InputLaporanRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Laporan;
use App\Models\Peserta;
use App\Models\Susunan;
use Illuminate\Support\Facades\File;
use PhpOffice\PhpWord\TemplateProcessor;

class LaporanController extends Controller
{
    public function input_laporan(InputLaporanRequest $request)
    {
        try{
            $data = $request->validationData();
            if (isset($data['bukti_presensi_kehadiran'])) {
                $filename_presensi_kehadiran = auth()->id() . '_' . rand(10000, 99999) . '_' . auth()->id() . '.' . $request->bukti_presensi_kehadiran->extension();
                $type = $request->bukti_presensi_kehadiran->getClientMimeType();
                $size = $request->bukti_presensi_kehadiran->getSize();
                $request->bukti_presensi_kehadiran->move('bukti', $filename_presensi_kehadiran);
                $data['bukti_presensi_kehadiran'] = $filename_presensi_kehadiran;
            }
            if (isset($data['file_pendukung_rapat'])) {
                $filename_file_pendukung_rapat = auth()->id() . '_' . rand(10000, 99999) . '_' . auth()->id() . '.' . $request->file_pendukung_rapat->extension();
                $type = $request->file_pendukung_rapat->getClientMimeType();
                $size = $request->file_pendukung_rapat->getSize();
                $request->file_pendukung_rapat->move('bukti', $filename_file_pendukung_rapat);
                $data['file_pendukung_rapat'] = $filename_file_pendukung_rapat;
            }
            $data['tanggal_rapat']= $data['tanggal_rapat'].' '.$data['jam_rapat'].':00';
            $data['tanggal_rapat'] = date_format(date_create($data['tanggal_rapat']), 'Y-m-d H:i:s');
            $data['persoalan_yang_dibahas'] = 'Perihal mahasiswa\\r\\'.$data['mahasiswa'].$data['dosen'].$data['tendik'].$data['sarpras'].$data['lain_lain'];
            unset($data['mahasiswa'],$data['dosen'],$data['tendik'],$data['sarpras'],$data['lain_lain']);
            $laporan = new Laporan($data);
            $laporan->fk_user = Auth::id();
            $laporan->save();
            foreach($data['peserta_rapat'] as $val){
                $peserta = new Peserta();
                $peserta->fk_laporan = $laporan->id;
                $peserta->nama_peserta = $val;
                $peserta->save();
            }
            foreach($data['susunan_acara'] as $val){
                $peserta = new Susunan();
                $peserta->fk_laporan = $laporan->id;
                $peserta->nama_susunan = $val;
                $peserta->save();
            }
            try {
                // Load the template file
                if(is_null($laporan->file_pendukung_rapat)&&is_null($laporan->nama_KSM)) $templateProcessor = new TemplateProcessor(public_path('templateOutput.docx'));
                elseif(is_null($laporan->nama_KSM)) {
                    $templateProcessor = new TemplateProcessor(public_path('templateOutputFilePendukung.docx'));
                    $templateProcessor->setImageValue('file_pendukung_rapat', array(
                        'path' =>"bukti/$laporan->file_pendukung_rapat",
                        'ratio' => true,
                        'width' => 1000,
                        'height' => 1000,
                    ));
                }elseif(is_null($laporan->file_pendukung_rapat)){
                    $templateProcessor = new TemplateProcessor(public_path('templateOutputKSM.docx'));
                }else{
                    $templateProcessor = new TemplateProcessor(public_path('templateOutputKSMFilePendukung.docx'));
                    $templateProcessor = new TemplateProcessor(public_path('templateOutputFilePendukung.docx'));
                    $templateProcessor->setImageValue('file_pendukung_rapat', array(
                        'path' =>"bukti/$laporan->file_pendukung_rapat",
                        'ratio' => true,
                        'width' => 1000,
                        'height' => 1000,
                    ));
                }
                if(!is_null($laporan->nama_KSM)){
                    $templateProcessor->setValue('nama_jabatan_KSM', $laporan->nama_jabatan_KSM);
                    $templateProcessor->setValue('nama_KSM', $laporan->nama_KSM);
                    $templateProcessor->setImageValue('tanda_tangan_KSM', array(
                        'path' => $laporan->tanda_tangan_KSM,
                        'width' => 120,
                        'height' => 120,
                        'ratio' => false
                    ));
                    $templateProcessor->setValue('NIP_KSM', $laporan->NIP_KSM);
                }
                
                // Set values for the placeholders in the template
                $templateProcessor->setValue('nama_rapat', $laporan->nama_rapat);
                $templateProcessor->setValue('hari', date('dddd',strtotime($laporan->tanggal_rapat)));
                $templateProcessor->setValue('tanggal',date('d m Y',strtotime($laporan->tanggal_rapat)));
                $templateProcessor->setValue('pukul',date('H:i:s',strtotime($laporan->tanggal_rapat)));
                $templateProcessor->setValue('tempat', $laporan->tempat);
    
                // Handle susunan acara (agenda items)
                $susunan_acara = array_map(function ($su) { return $su['nama_susunan']; }, $laporan->susunans->toArray());
                $templateProcessor->cloneRow('susunan_acara', count($susunan_acara));
                $no_susunan = 1;
                foreach ($susunan_acara as $val) {
                    $templateProcessor->setValue('susunan_acara#' . $no_susunan, $val);
                    $templateProcessor->setValue('no_su#' . $no_susunan, $no_susunan);
                    $no_susunan++;
                }
    
                // Set additional placeholders
                $templateProcessor->setValue('pemimpin_rapat', $laporan->pemimpin_rapat);
                $templateProcessor->setValue('pencatat', $laporan->pencatat);
    
                // Handle peserta rapat (meeting participants)
                $peserta_rapat = array_map(function ($pr) { return $pr['nama_peserta']; }, $laporan->pesertas->toArray());
                $templateProcessor->cloneRow('nama_peserta', count($peserta_rapat));
                $no_peserta = 1;
                foreach ($peserta_rapat as $i => $val) {
                    $templateProcessor->setValue('nama_peserta#' . $no_peserta, $val);
                    $templateProcessor->setValue('no_np#' . $no_peserta, $no_peserta);
                    $no_peserta++;
                }
    
                // Set more placeholders
                $templateProcessor->setValue('persoalan_dibahas', $data['persoalan_yang_dibahas']);
                $templateProcessor->setValue('tanggapan_peserta_rapat', $laporan->tanggapan_peserta_rapat);
                $templateProcessor->setValue('simpulan', $laporan->simpulan);
                $templateProcessor->setValue('nama_jabatan', $laporan->nama_jabatan_pejabat);
                $templateProcessor->setValue('nama_pejabat', $laporan->nama_pejabat);
                $templateProcessor->setImageValue('tanda_tangan', array(
                    'path' => $laporan->tanda_tangan_pejabat,
                    'width' => 120,
                    'height' => 120,
                    'ratio' => false
                ));
                $templateProcessor->setValue('NIP', $laporan->NIP_pejabat);
                $templateProcessor->setImageValue('lampiran', array(
                    'path' =>"bukti/$laporan->bukti_presensi_kehadiran",
                    'ratio' => true,
                    'width' => 1000,
                    'height' => 1000,
                ));
                header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document'); //mime type
                header('Cache-Control: max-age=0'); //no cache
                header('Content-Disposition: attachment;filename="output_rapat.docx"'); //tell browser what's the file name
                $templateProcessor->saveAs('php://output');
            } catch (\Exception $e) {
                return $e;
            }
            return redirect()->back()->with('success', 'Berhasil mengumpulkan laporan');
        
        
        }catch(\Exception $e){
            return $e;
        }
    }
    public function edit_laporan(EditLaporanRequest $request)
    {
        $data = $request->validationData();
        if (isset($data['bukti_presensi'])) {
            $fileName = auth()->id() . '_' . time() . '.' . $request->bukti_presensi->extension();
            $type = $request->bukti_presensi->getClientMimeType();
            $size = $request->bukti_presensi->getSize();
            $request->bukti_presensi->move('bukti', $fileName);
            $data['bukti_presensi'] = $fileName;
        }
        if (isset($data['tanda_tangan_kadep'])) {
            $fileName = auth()->id() . '_' . time() . '.' . $request->tanda_tangan_kadep->extension();
            $type = $request->tanda_tangan_kadep->getClientMimeType();
            $size = $request->tanda_tangan_kadep->getSize();
            $request->tanda_tangan_kadep->move('bukti', $fileName);
            $data['tanda_tangan_kadep'] = $fileName;
        }
        if (isset($data['tanda_tangan_kaprodi'])) {
            $fileName = auth()->id() . '_' . time() . '.' . $request->tanda_tangan_kaprodi->extension();
            $type = $request->tanda_tangan_kaprodi->getClientMimeType();
            $size = $request->tanda_tangan_kaprodi->getSize();
            $request->tanda_tangan_kaprodi->move('bukti', $fileName);
            $data['tanda_tangan_kaprodi'] = $fileName;
        }
        
    }
    public function hapus_file($namafile)
    {
        if (File::exists('bukti//' . $namafile)) {
            File::delete('bukti//' . $namafile);
        } else {
            dd('File not found');
        }
    }
    public function riwayat_laporan()
    {
        $laporans = Laporan::where('fk_user', Auth::id())->get();
        return view('riwayat_laporan')->with(['laporans' => $laporans]);
    }
    public function print_laporan()
    {
        try {
            // Load the template file
            $templateProcessor = new TemplateProcessor(public_path('templateoutput.docx'));

            // Set values for the placeholders in the template
            $templateProcessor->setValue('nama_rapat', 'Rapat 1');
            $templateProcessor->setValue('hari', 'Kamis');
            $templateProcessor->setValue('tanggal', '26 September 2024');
            $templateProcessor->setValue('pukul', '08:00');
            $templateProcessor->setValue('tempat', 'Ruang PAK');

            // Handle susunan acara (agenda items)
            $susunan_acara = ['susunan1', 'susunan2', 'susunan3'];
            $templateProcessor->cloneRow('susunan_acara', count($susunan_acara));
            $no_susunan = 1;
            foreach ($susunan_acara as $val) {
                $templateProcessor->setValue('susunan_acara#' . $no_susunan, $val);
                $templateProcessor->setValue('no_su#' . $no_susunan, $no_susunan);
                $no_susunan++;
            }

            // Set additional placeholders
            $templateProcessor->setValue('pemimpin_rapat', 'Pak Tuntas');
            $templateProcessor->setValue('pencatat', 'Hizkiel');

            // Handle peserta rapat (meeting participants)
            $peserta_rapat = ['peserta1', 'peserta2', 'peserta3'];
            $templateProcessor->cloneRow('nama_peserta', count($peserta_rapat));
            $no_peserta = 1;
            foreach ($peserta_rapat as $i => $val) {
                $templateProcessor->setValue('nama_peserta#' . $no_peserta, $val);
                $templateProcessor->setValue('no_np#' . $no_peserta, $no_peserta);
                $no_peserta++;
            }

            // Set more placeholders
            $templateProcessor->setValue('persoalan_dibahas', 'Anu');
            $templateProcessor->setValue('tanggapan_peserta', 'Anu');
            $templateProcessor->setValue('simpulan', 'Anu');
            $templateProcessor->setValue('nama_jabatan', 'SPV');
            $templateProcessor->setValue('nama_pejabat', 'Pak Sus');
            $templateProcessor->setImageValue('tanda_tangan', array(
                'path' => 'data:image/png;base64,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',
                'width' => 120,
                'height' => 120,
                'ratio' => false
            ));
            $templateProcessor->setValue('NIP', '290522');
            header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document'); //mime type
            header('Cache-Control: max-age=0'); //no cache
            header('Content-Disposition: attachment;filename="output_rapat.docx"'); //tell browser what's the file name
            $templateProcessor->saveAs('php://output');
        } catch (\Exception $e) {
            return $e;
        }
    }
}
