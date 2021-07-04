<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SiteRequest extends FormRequest
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
            'foto'      => 'image|mimes:jpg,png,jpeg|max:2048',
            'nama'      => 'required|regex:/^[a-z-A-Z_\s\.]*$/',
            'email'     => 'required|email',
            'no_telp'   => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'foto.image'        => 'Foto harus berupa gambar valid',
            'foto.mimes'        => 'ekstensi foto (jpg/jpeg/png)',
            'foto.max'          => 'Ukuran Foto maksimal 2mb',
            'nama.required'     => 'Nama tidak boleh kosong',
            'nama.regex'        => 'Nama harus berupa karakter',
            'email'             => 'Email tidak boleh kosong',
            'email.email'       => 'Email harus valid',
            'no_telp.required'  => 'No Hp tidak boleh kosong',
            'no_telp.numeric'   => 'No Hp harus berupa angka'
        ];
    }
}
