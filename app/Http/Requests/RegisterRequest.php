<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'nama'                      => 'required|min:4|regex:/^[a-z-A-Z_\s\.]*$/',
            'email'                     => 'required|email|min:4|unique:users',
            'alamat'                    => 'required|min:4',
            'jenis_kelamin'             => 'required',
            'no_hp'                     => 'required|numeric|min:4',
            'username'                  => 'required|unique:users',
            'password'                  => 'required|min:6|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'nama.required'             => 'Nama tidak boleh kosong',
            'nama.min'                  => 'Nama minimal 4 karakter',
            'nama.regex'                => 'Nama harus berupa karakter',
            'email.required'            => 'Email tidak boleh kosong',
            'email.email'               => 'Email harus valid',
            'email.min'                 => 'Email minimal 4 karakter',
            'email.unique'              => 'Email telah digunakan',
            'alamat.required'           => 'Alamat tidak boleh kosong',
            'alamat.min'                => 'Alamat minimal 4 karakter',
            'jenis_kelamin.required'    => 'Jenis kelamin tidak boleh kosong',
            'no_hp.required'            => 'No Hp tidak boleh kosong',
            'no_hp.numerirc'            => 'No Hp harus berupa angka',
            'no_hp.min'                 => 'No Hp minimal 4 digit',
            'username.required'         => 'Username tidak boleh kosong',
            'username.unique'           => 'Username telah digunakan',
            'password.required'         => 'Password tidak boleh kosong',
            'password.min'              => 'Password minimal 6 karakter',
            'password.confirmed'        => 'Ulangi Password tidak cocok',
        ];
    }
}
