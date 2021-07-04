<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'nama'      => 'required|min:4|regex:/^[a-z-A-Z_\s\.]*$/',
            'alamat'    => 'required|min:4',
            'email'     => 'required|min:4|email',
            'no_hp'     => 'required|min:4|numeric',
            'foto'      => 'image|max:2048|mimes:jpg,png,jpeg'
        ];
    }

    public function messages()
    {
        return [
            'nama.required'             => 'Nama tidak boleh kosong',
            'nama.min'                  => 'Nama minimal 4 karakter',
            'nama.regex'                => 'Nama harus berupa karakter',
            'alamat.required'           => 'Alamat tidak boleh kosong',
            'alamat.min'                => 'Alamat minimal 4 karakter',
            'email.required'            => 'Email tidak boleh kosong',
            'email.min'                 => 'Email minimal 4 karakter',
            'email.email'               => 'Email harus valid',
            'jenis_kelamin'             => 'Jenis kelamin tidak boleh kosong',
            'no_hp.required'            => 'No Hp tidak boleh kosong',
            'no_hp.numerirc'            => 'No Hp harus berupa angka',
            'no_hp.min'                 => 'No Hp minimal 4 digit',
            'foto'                      => 'Foto harus berupa gambar',
            'foto.max'                  => 'Ukuran Foto maksimal 2mb',
            'foto.mimes'                => 'Foto harus berekstensi (jpg,png,jpeg)'
        ];
    }
}
