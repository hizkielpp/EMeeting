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
            'agenda' => 'required',
            'pemimpin_rapat' => 'required',
            'peserta_rapat' => 'required',
            'tanggapan_peserta_rapat' => 'required',
            'simpulan' => 'required',
            'evaluasi' => 'required',
        ];
    }
}
