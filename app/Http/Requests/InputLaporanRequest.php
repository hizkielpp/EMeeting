<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InputLaporanRequest extends FormRequest
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
            'nama_rapat' => 'required',
            'tanggal_rapat' => 'required',
            'jam_rapat' => 'required',
            'tempat' => 'required',
            'pemimpin_rapat' => 'required',
            // 'pencatat' => 'required',
            'nama_jabatan_pejabat' => 'required',
            'tanda_tangan_pejabat' => 'required',
            'nama_pejabat' => 'required',
            'NIP_pejabat' => 'required',
            'bukti_presensi_kehadiran' => 'required'
        ];
    }
}
