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
            'tanggal_rapat' => 'required',
            'mahasiswa' => 'required',
            'dosen' => 'required',
            'tendik' => 'required',
            'sarpras' => 'required',
            'bukti_presensi' => 'required',
            'tanda_tangan_kaprodi' => 'required'
        ];
    }
}
