<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RakRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'nama_rak'      => 'required|min:6',
            'lokasi_rak'    => 'required|min:6',
        ];
    }
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'nama_rak.required'     => 'Nama Rak tidak boleh kosong',
            'nama_rak.min'          => 'Nama Rak minimal 6 karakter',
            'lokasi_rak.required'   => 'Lokasi Rak tidak boleh kosong',
            'lokasi_rak.min'        => 'Lokasi Rak minimal 6 karakter'
        ];
    }
}
