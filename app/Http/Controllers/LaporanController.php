<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditLaporanRequest;
use App\Http\Requests\InputLaporanRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Laporan;
use Illuminate\Support\Facades\File;

class LaporanController extends Controller
{
    public function input_laporan(InputLaporanRequest $request)
    {
        $data = $request->validationData();
        if (isset($data['bukti_presensi_kehadiran'])) {
            $filename_presensi_kehadiran = auth()->id() . '_' . rand(10000, 99999) . '_' . auth()->id() . '.' . $request->bukti_presensi_kehadiran->extension();
            $type = $request->bukti_presensi_kehadiran->getClientMimeType();
            $size = $request->bukti_presensi_kehadiran->getSize();
            $request->bukti_presensi_kehadiran->move('bukti', $filename_presensi_kehadiran);
            $data['bukti_presensi_kehadiran'] = $filename_presensi_kehadiran;
        }
        if (isset($data['tanda_tangan_kadep'])) {
            $filename_tanda_tangan_kadep = auth()->id() . '_' . rand(10000, 99999) . '_' . auth()->id() . '.' . $request->tanda_tangan_kadep->extension();
            $type = $request->tanda_tangan_kadep->getClientMimeType();
            $size = $request->tanda_tangan_kadep->getSize();
            $request->tanda_tangan_kadep->move('bukti', $filename_tanda_tangan_kadep);
            $data['tanda_tangan_kadep'] = $filename_tanda_tangan_kadep;
        }
        if (isset($data['file_pendukung_rapat'])) {
            $filename_file_pendukung_rapat = auth()->id() . '_' . rand(10000, 99999) . '_' . auth()->id() . '.' . $request->file_pendukung_rapat->extension();
            $type = $request->file_pendukung_rapat->getClientMimeType();
            $size = $request->file_pendukung_rapat->getSize();
            $request->file_pendukung_rapat->move('bukti', $filename_file_pendukung_rapat);
            $data['file_pendukung_rapat'] = $filename_file_pendukung_rapat;
        }
        if (isset($data['tanda_tangan_kaprodi'])) {
            $filename_tanda_tangan_kaprodi = auth()->id() . '_' . rand(10000, 99999) . '_' . auth()->id() . '.' . $request->tanda_tangan_kaprodi->extension();
            $type = $request->tanda_tangan_kaprodi->getClientMimeType();
            $size = $request->tanda_tangan_kaprodi->getSize();
            $request->tanda_tangan_kaprodi->move('bukti', $filename_tanda_tangan_kaprodi);
            $data['tanda_tangan_kaprodi'] = $filename_tanda_tangan_kaprodi;
        }
        $data['tanggal_rapat'] = date_format(date_create($data['tanggal_rapat']), 'Y-m-d H:i:s');
        $laporan = new Laporan($data);
        $laporan->fk_user = Auth::id();
        $laporan->save();
        return redirect()->back()->with('success', 'Berhasil mengumpulkan laporan');
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
}
