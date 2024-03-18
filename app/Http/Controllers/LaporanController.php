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
        $fileName = auth()->id() . '_' . time() . '.' . $request->bukti_presensi->extension();
        $type = $request->bukti_presensi->getClientMimeType();
        $size = $request->bukti_presensi->getSize();
        $request->bukti_presensi->move('bukti', $fileName);
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
