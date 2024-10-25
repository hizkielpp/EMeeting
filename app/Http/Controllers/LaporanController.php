<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditLaporanRequest;
use App\Http\Requests\InputLaporanRequest;
use App\Models\Agenda;
use Illuminate\Support\Facades\Auth;
use App\Models\Laporan;
use App\Models\Peserta;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Webklex\PDFMerger\Facades\PDFMergerFacade as PDFMerger;
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
            $data['tanggal_rapat'] = Carbon::createFromFormat('d-m-Y H:i:s', $data['tanggal_rapat'])->format('Y-m-d H:i:s');
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
            foreach ($data['agenda'] as $val) {
                $peserta = new Agenda();
                $peserta->fk_laporan = $laporan->id;
                $peserta->nama_agenda = $val;
                $peserta->save();
            }
            return redirect()->to('log_laporan')->with('success', 'Berhasil mengumpulkan laporan');
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
            ->select('users.username', 'laporans.*', DB::raw('IFNULL(tanda_tangan_pejabat, NULL)&&IFNULL(bukti_presensi_kehadiran, NULL) as belum'))
            ->where('laporans.fk_unit', '=', Auth::user()->fk_unit)
            ->orderBy('tanggal_rapat', 'desc')
            ->paginate(5);
        foreach ($laporans as $value) {
            $value['mahasiswa_array'] = array_merge(preg_split('/\n|\r\n?/', $value['mahasiswa']));
            $value['dosen_array'] = array_merge(preg_split('/\n|\r\n?/', $value['dosen']));
            $value['tendik_array'] = array_merge(preg_split('/\n|\r\n?/', $value['tendik']));
            $value['sarpras_array'] = array_merge(preg_split('/\n|\r\n?/', $value['sarpras']));
            $value['lain_lain_array'] = array_merge(preg_split('/\n|\r\n?/', $value['lain_lain']));
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
        $laporans = Laporan::leftJoin('users', 'users.id', '=', 'laporans.fk_user')
            ->when($search, function ($query, $search) {
                return $query
                    ->where(function ($query) use ($search) {
                        $query->where('nama_rapat', 'like', '%' . $search . '%')
                            ->orWhere('tempat', 'like', '%' . $search . '%')
                            ->orWhere('users.username', 'like', '%' . $search . '%')
                            ->orWhere('pemimpin_rapat', 'like', '%' . $search . '%');
                    });
            })
            ->where('laporans.fk_unit', '=', $request->id_unit)
            ->select('users.username', 'laporans.*', DB::raw('IFNULL(tanda_tangan_pejabat, NULL)&&IFNULL(bukti_presensi_kehadiran, NULL) as belum'))
            ->orderBy('tanggal_rapat', 'desc')
            ->paginate(5);
        foreach ($laporans as $value) {
            $value['mahasiswa_array'] = array_merge(preg_split('/\n|\r\n?/', $value['mahasiswa']));
            $value['dosen_array'] = array_merge(preg_split('/\n|\r\n?/', $value['dosen']));
            $value['tendik_array'] = array_merge(preg_split('/\n|\r\n?/', $value['tendik']));
            $value['sarpras_array'] = array_merge(preg_split('/\n|\r\n?/', $value['sarpras']));
            $value['lain_lain_array'] = array_merge(preg_split('/\n|\r\n?/', $value['lain_lain']));
            $value['tanggapan_array'] = array_merge(preg_split('/\n|\r\n?/', $value['tanggapan_peserta_rapat']));
            $value['simpulan_array'] = array_merge(preg_split('/\n|\r\n?/', $value['simpulan']));
        }
        // Return view with the paginated data
        return view('remake.laporan.index_pimpinan', compact('laporans', 'search'));
    }
    public function edit_laporan(Request $request)
    {
        $laporan = Laporan::with('agendas', 'pesertas')->find($request->id);
        return view('remake.laporan.edit', compact('laporan'));
    }
    public function update_laporan(EditLaporanRequest $request)
    {
        try {
            $data = $request->validationData();
            $laporan = Laporan::find($request->id_laporan);
            // check condition for pejabat
            if (isset($data['tanda_tangan_pejabat'])) {
                $fileName = auth()->id() . '_' . rand(10000, 99999) . '_' . auth()->id() . '.' . $request->tanda_tangan_pejabat->extension();
                $type = $request->tanda_tangan_pejabat->getClientMimeType();
                $size = $request->tanda_tangan_pejabat->getSize();
                $request->tanda_tangan_pejabat->move('tanda_tangan', $fileName);
                $data['tanda_tangan_pejabat'] = $fileName;
                $this->delete_file($laporan->tanda_tangan_pejabat);
            }
            // check condition for KSM
            if (isset($data['tanda_tangan_KSM'])) {
                $fileName = auth()->id() . '_' . rand(10000, 99999) . '_' . auth()->id() . '.' . $request->tanda_tangan_KSM->extension();
                $type = $request->tanda_tangan_KSM->getClientMimeType();
                $size = $request->tanda_tangan_KSM->getSize();
                $request->tanda_tangan_KSM->move('tanda_tangan', $fileName);
                $data['tanda_tangan_KSM'] = $fileName;
                $this->delete_file($laporan->tanda_tangan_KSM);
            }
            // check condition for KABAG
            if (isset($data['tanda_tangan_Kabag'])) {
                $fileName = auth()->id() . '_' . rand(10000, 99999) . '_' . auth()->id() . '.' . $request->tanda_tangan_Kabag->extension();
                $type = $request->tanda_tangan_Kabag->getClientMimeType();
                $size = $request->tanda_tangan_Kabag->getSize();
                $request->tanda_tangan_Kabag->move('tanda_tangan', $fileName);
                $data['tanda_tangan_Kabag'] = $fileName;
                $this->delete_file($laporan->tanda_tangan_Kabag);
            }
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
            Agenda::where('fk_laporan', $laporan->id)->delete();
            foreach ($data['agenda'] as $val) {
                $peserta = new Agenda();
                $peserta->fk_laporan = $laporan->id;
                $peserta->nama_agenda = $val;
                $peserta->save();
            }
            $data['tanggal_rapat'] = $data['tanggal_rapat'] . ' ' . $data['jam_rapat'] . ':00';
            $data['tanggal_rapat'] = Carbon::createFromFormat('d-m-Y H:i:s', $data['tanggal_rapat'])->format('Y-m-d H:i:s');
            unset($data['jam_rapat']);

            $laporan->update($data);
            return redirect()->to('log_laporan')->with('success', 'Berhasil mengubah laporan');
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function print_laporan(Request $request)
    {

        $laporan = Laporan::find($request->id);
        $laporan['mahasiswa_array'] = array_merge(preg_split('/\n|\r\n?/', $laporan['mahasiswa']));
        $laporan['dosen_array'] = array_merge(preg_split('/\n|\r\n?/', $laporan['dosen']));
        $laporan['tendik_array'] = array_merge(preg_split('/\n|\r\n?/', $laporan['tendik']));
        $laporan['sarpras_array'] = array_merge(preg_split('/\n|\r\n?/', $laporan['sarpras']));
        $laporan['lain_lain_array'] = array_merge(preg_split('/\n|\r\n?/', $laporan['lain_lain']));
        $laporan['tanggapan_array'] = array_merge(preg_split('/\n|\r\n?/', $laporan['tanggapan_peserta_rapat']));
        $laporan['simpulan_array'] = array_merge(preg_split('/\n|\r\n?/', $laporan['simpulan']));
        $laporan['evaluasi_array'] = array_merge(preg_split('/\n|\r\n?/', $laporan['evaluasi']));
        $laporan['pembinaan_array'] = array_merge(preg_split('/\n|\r\n?/', $laporan['pembinaan']));
        $pdf = Pdf::loadView('remake.laporan.notula', ['laporan' => $laporan]);
        $output_filename = time() . Auth::id() . 'output' . '.pdf';
        $pdf->save('output/' . $output_filename);
        // init PDFMerger
        $pdf = PDFMerger::init();
        // add output (notula) to the merger
        $pdf->addPDF('output/' . $output_filename, 'all');
        // add bukti kehadiran
        $pdf->addPDF('bukti/' . $laporan->bukti_presensi_kehadiran, 'all');
        if (!is_null($laporan->file_pendukung_rapat)) {
            // add file pendukung if exist
            $pdf->addPDF('bukti/' . $laporan->file_pendukung_rapat, 'all');
        }
        $fileName = time() . '.pdf';
        $pdf->merge();
        $pdf->save('output/' . $fileName);
        // $pdf->stream('output/' . $fileName, array("Attachment" => false));
        // exit(0);
        return response()->download('output/' . $fileName);
    }
}
