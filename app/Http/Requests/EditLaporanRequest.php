<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditLaporanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'id_laporan' => 'required',
            'nama_rapat' => 'required',
            'tanggal_rapat' => 'required',
            'jam_rapat' => 'required',
            'tempat' => 'required',
            'susunan_acara' => 'required',
            'pemimpin_rapat' => 'required',
            'pencatat' => 'required',
            'peserta_rapat' => 'required',
            'nama_jabatan_pejabat' => 'required',
            'tanda_tangan_pejabat' => 'required',
            'nama_pejabat' => 'required',
            'NIP_pejabat' => 'required',
            // optional
            // 'nama_jabatan_KSM' => 'required',
            // 'tanda_tangan_KSM' => 'required',
            // 'nama_KSM' => 'required',
            // 'NIP_KSM' => 'required',
            'persoalan_yang_dibahas' => 'required',
            'tanggapan_peserta_rapat' => 'required',
            'simpulan' => 'required',
        ];
    }
}
