<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditLaporanRequest;
use App\Http\Requests\InputLaporanRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Laporan;
use App\Models\Peserta;
use App\Models\Susunan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
// use PhpOffice\PhpWord\IOFactory;
// use PhpOffice\PhpWord\TemplateProcessor;

class LaporanController extends Controller
{
    public function input_laporan(InputLaporanRequest $request)
    {
        try {
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
            $data['tanggal_rapat'] = $data['tanggal_rapat'] . ' ' . $data['jam_rapat'] . ':00';
            $data['tanggal_rapat'] = date_format(date_create($data['tanggal_rapat']), 'Y-m-d H:i:s');
            $data['persoalan_yang_dibahas'] = $data['mahasiswa'] . $data['dosen'] . $data['tendik'] . $data['sarpras'] . $data['lain_lain'];
            unset($data['mahasiswa'], $data['dosen'], $data['tendik'], $data['sarpras'], $data['lain_lain']);
            $laporan = new Laporan($data);
            $laporan->fk_user = Auth::id();
            $laporan->fk_unit = Auth::user()->fk_unit;
            $laporan->save();
            foreach ($data['peserta_rapat'] as $val) {
                $peserta = new Peserta();
                $peserta->fk_laporan = $laporan->id;
                $peserta->nama_peserta = $val;
                $peserta->save();
            }
            foreach ($data['susunan_acara'] as $val) {
                $peserta = new Susunan();
                $peserta->fk_laporan = $laporan->id;
                $peserta->nama_susunan = $val;
                $peserta->save();
            }
            return redirect()->back()->with('success', 'Berhasil mengumpulkan laporan');
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function create_laporan()
    {
        return view('remake.laporan.create');
    }
    public function delete_file($namafile)
    {
        if (File::exists('bukti//' . $namafile)) {
            File::delete('bukti//' . $namafile);
        } else {
            dd('File not found');
        }
    }
    public function log_laporan(Request $request)
    {
        // Get the search query from the input
        $search = $request->input('search');
        // Fetch reports with pagination and search filter'
        $unit = DB::table('units')->where('units.id', '=', Auth::user()->fk_unit)->first();
        $laporans = Laporan::leftJoin('users', 'users.id', '=', 'laporans.fk_user')->when($search, function ($query, $search) {
            return $query->where(function ($query) use ($search) {
                $query->where('nama_rapat', 'like', '%' . $search . '%')
                    ->orWhere('tempat', 'like', '%' . $search . '%')
                    ->orWhere('users.username', 'like', '%' . $search . '%')
                    ->orWhere('tanggal_rapat', 'like', '%' . $search . '%')
                    ->orWhere('pemimpin_rapat', 'like', '%' . $search . '%');
            });
        })
            ->select('users.username', 'laporans.*')
            ->where('laporans.fk_unit', '=', Auth::user()->fk_unit)
            ->orderBy('tanggal_rapat', 'desc')
            ->paginate(5);
        foreach ($laporans as $value) {
            $value['persoalan_array'] = array_merge(preg_split('/\n|\r\n?/', $value['persoalan_yang_dibahas']));
            $value['tanggapan_array'] = array_merge(preg_split('/\n|\r\n?/', $value['tanggapan_peserta_rapat']));
            $value['simpulan_array'] = array_merge(preg_split('/\n|\r\n?/', $value['simpulan']));
        }
        // Return view with the paginated data
        return view('remake.laporan.index', compact('laporans', 'search'));
    }
    public function log_laporan_pimpinan(Request $request)
    {
        // Get the search query from the input
        $search = $request->input('search');
        // Fetch reports with pagination and search filter'
        $laporans = Laporan::leftJoin('users', 'users.id', '=', 'laporans.fk_user')->when($search, function ($query, $search) {
            return $query
                ->where(function ($query) use ($search) {
                    $query->where('nama_rapat', 'like', '%' . $search . '%')
                        ->orWhere('tempat', 'like', '%' . $search . '%')
                        ->orWhere('users.username', 'like', '%' . $search . '%')
                        ->orWhere('pemimpin_rapat', 'like', '%' . $search . '%');
                });
        })
            ->where('laporans.fk_unit', '=', $request->id_unit)
            ->select('users.username', 'laporans.*')
            ->orderBy('tanggal_rapat', 'desc')
            ->paginate(5);
        foreach ($laporans as $value) {
            $value['persoalan_array'] = array_merge(preg_split('/\n|\r\n?/', $value['persoalan_yang_dibahas']));
            $value['tanggapan_array'] = array_merge(preg_split('/\n|\r\n?/', $value['tanggapan_peserta_rapat']));
            $value['simpulan_array'] = array_merge(preg_split('/\n|\r\n?/', $value['simpulan']));
        }
        // Return view with the paginated data
        return view('remake.laporan.index_pimpinan', compact('laporans', 'search'));
    }
    // Print laporan using TemplateProcessor
    // public function print_laporan(Request $request)
    // {
    //     $laporan = Laporan::find($request->id);
    //     try {
    //         // Load the template file
    //         if (is_null($laporan->tanda_tangan_KSM)) {
    //             $templateProcessor = new TemplateProcessor('templateOutput.docx');
    //         } else {
    //             $templateProcessor = new TemplateProcessor('templateOutputKSM.docx');
    //         }
    //         if (!is_null($laporan->nama_KSM)) {
    //             $templateProcessor->setValue('nama_jabatan_KSM', $laporan->nama_jabatan_KSM);
    //             $templateProcessor->setValue('nama_KSM', $laporan->nama_KSM);
    //             $templateProcessor->setImageValue('tanda_tangan_KSM', array(
    //                 'path' => $laporan->tanda_tangan_KSM,
    //                 'width' => 120,
    //                 'height' => 120,
    //                 'ratio' => false
    //             ));
    //             $templateProcessor->setValue('NIP_KSM', $laporan->NIP_KSM);
    //         }
    //         $date = Carbon::parse($laporan->tanggal_rapat)->locale('id');
    //         $date->settings(['formatFunction' => 'translatedFormat']);
    //         // Set values for the placeholders in the template
    //         $templateProcessor->setValue('nama_rapat', $laporan->nama_rapat);
    //         $templateProcessor->setValue('hari', $date->format('l'));
    //         $templateProcessor->setValue('tanggal', $date->format('j F Y'));
    //         $templateProcessor->setValue('pukul', $date->format('h:i'));
    //         $templateProcessor->setValue('tempat', $laporan->tempat);

    //         // Handle susunan acara (agenda items)
    //         $susunan_acara = array_map(function ($su) {
    //             return $su['nama_susunan'];
    //         }, $laporan->susunans->toArray());
    //         $templateProcessor->cloneRow('susunan_acara', count($susunan_acara));
    //         $no_susunan = 1;
    //         foreach ($susunan_acara as $val) {
    //             $templateProcessor->setValue('susunan_acara#' . $no_susunan, $val);
    //             $templateProcessor->setValue('no_su#' . $no_susunan, $no_susunan);
    //             $no_susunan++;
    //         }

    //         // Set additional placeholders
    //         $templateProcessor->setValue('pemimpin_rapat', $laporan->pemimpin_rapat);
    //         $templateProcessor->setValue('pencatat', $laporan->pencatat);

    //         // Handle peserta rapat (meeting participants)
    //         $peserta_rapat = array_map(function ($pr) {
    //             return $pr['nama_peserta'];
    //         }, $laporan->pesertas->toArray());
    //         $templateProcessor->cloneRow('nama_peserta', count($peserta_rapat));
    //         $no_peserta = 1;
    //         foreach ($peserta_rapat as $i => $val) {
    //             $templateProcessor->setValue('nama_peserta#' . $no_peserta, $val);
    //             $templateProcessor->setValue('no_np#' . $no_peserta, $no_peserta);
    //             $no_peserta++;
    //         }

    //         // Set more placeholders
    //         $templateProcessor->setValue('persoalan_dibahas', $laporan->persoalan_yang_dibahas);
    //         $templateProcessor->setValue('tanggapan_peserta_rapat', $laporan->tanggapan_peserta_rapat);
    //         $templateProcessor->setValue('simpulan', $laporan->simpulan);
    //         $templateProcessor->setValue('nama_jabatan', $laporan->nama_jabatan_pejabat);
    //         $templateProcessor->setValue('nama_pejabat', $laporan->nama_pejabat);
    //         $templateProcessor->setImageValue('tanda_tangan', array(
    //             'path' => $laporan->tanda_tangan_pejabat,
    //             'width' => 120,
    //             'height' => 120,
    //             'ratio' => false
    //         ));
    //         $templateProcessor->setValue('NIP', $laporan->NIP_pejabat);
    //         $templateProcessor->setImageValue('lampiran', array(
    //             'path' => "bukti/$laporan->bukti_presensi_kehadiran",
    //             'ratio' => true,
    //             'width' => 1000,
    //             'height' => 1000,
    //         ));
    //         header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document'); //mime type
    //         header('Cache-Control: max-age=0'); //no cache
    //         header('Content-Disposition: attachment;filename="output_rapat.docx"'); //tell browser what's the file name
    //         $templateProcessor->saveAs('php://output');
    //     } catch (\Exception $e) {
    //         return $e;
    //     }
    // }
    public function edit_laporan(Request $request)
    {
        $laporan = Laporan::with('susunans', 'pesertas')->find($request->id);
        return view('remake.laporan.edit', compact('laporan'));
    }
    public function update_laporan(EditLaporanRequest $request)
    {
        try {
            $data = $request->validationData();
            $laporan = Laporan::find($request->id_laporan);
            if (isset($data['bukti_presensi_kehadiran'])) {
                $fileName = auth()->id() . '_' . rand(10000, 99999) . '_' . auth()->id() . '.' . $request->bukti_presensi_kehadiran->extension();
                $type = $request->bukti_presensi_kehadiran->getClientMimeType();
                $size = $request->bukti_presensi_kehadiran->getSize();
                $request->bukti_presensi_kehadiran->move('bukti', $fileName);
                $data['bukti_presensi_kehadiran'] = $fileName;
                $this->delete_file($laporan->bukti_presensi_kehadiran);
            }
            if (isset($data['file_pendukung_rapat'])) {
                $fileName = auth()->id() . '_' . rand(10000, 99999) . '_' . auth()->id() . '.' . $request->file_pendukung_rapat->extension();
                $type = $request->file_pendukung_rapat->getClientMimeType();
                $size = $request->file_pendukung_rapat->getSize();
                $request->file_pendukung_rapat->move('bukti', $fileName);
                $data['file_pendukung_rapat'] = $fileName;
                $this->delete_file($laporan->file_pendukung_rapat);
            }
            Peserta::where('fk_laporan', $laporan->id)->delete();
            foreach ($data['peserta_rapat'] as $val) {
                $peserta = new Peserta();
                $peserta->fk_laporan = $laporan->id;
                $peserta->nama_peserta = $val;
                $peserta->save();
            }
            Susunan::where('fk_laporan', $laporan->id)->delete();
            foreach ($data['susunan_acara'] as $val) {
                $peserta = new Susunan();
                $peserta->fk_laporan = $laporan->id;
                $peserta->nama_susunan = $val;
                $peserta->save();
            }
            $data['tanggal_rapat'] = $data['tanggal_rapat'] . ' ' . $data['jam_rapat'] . ':00';
            $data['tanggal_rapat'] = date_format(date_create($data['tanggal_rapat']), 'Y-m-d H:i:s');
            unset($data['jam_rapat']);
            $laporan->update($data);
            return redirect()->back()->with('success', 'Berhasil mengubah laporan');
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function print_laporan(Request $request)
    {
        // try {
        //     $data = [
        //         'title' => 'Welcome to ItSolutionStuff.com',
        //         'date' => date('m/d/Y'),
        //     ];
        //     $pdf = PDF::loadView('remake.laporan.notula', $data);
        //     return $pdf->download('notula.pdf');
        // } catch (\Exception $e) {
        //     return $e;
        // }
        $pdf = Pdf::loadView('remake.laporan.notula');
        return $pdf->download();
    }
}
