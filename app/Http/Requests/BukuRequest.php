<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BukuRequest extends FormRequest
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
            'judul_buku'     => 'required|min:4',
            'penulis_buku'   => 'required|min:4|regex:/^[a-z-A-Z_\s\.]*$/',
            'penerbit_buku'  => 'required|min:4|regex:/^[a-z-A-Z_\s\.]*$/',
            'foto_buku'      => 'mimes:jpg,png,jpeg|image',
            'tahun_penerbit' => 'required|min:4|numeric',
            'stok'           => 'required|numeric',
            'id_rak'         => 'required|numeric'
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
            'judul_buku.required'       => 'Judul Buku tidak boleh kosong',
            'judul_buku.min'            => 'Judul Buku minimal 4 karakter',
            'penulis_buku.required'     => 'Penulis Buku tidak boleh kosong',
            'penulis_buku.min'          => 'Penulis Buku minimal 4 karakter',
            'penulis_buku.regex'        => 'Penulis Buku harus berupa karakter',
            'penerbit_buku.required'    => 'Penerbit Buku tidak boleh kosong',
            'penerbit_buku.min'         => 'Penerbit Buku minimal 4 karakter',
            'penerbit_buku.regex'       => 'Penerbit Buku harus berupa karakter',
            'foto_buku.required'        => 'Foto Buku tidak boleh kosong',
            'foto_buku.mimes'           => 'Foto Buku harus berupa (jpg/png/jpeg)',
            'tahun_penerbit.required'   => 'Tahun Penerbit tidak boleh kosong',
            'tahun_penerbit.min'        => 'Tahun Penerbit minimal 4 karakter',
            'tahun_penerbit.numeric'    => 'Tahun Penerbit harus berupa angka',
            'stok.required'             => 'Stok tidak boleh kosong',
            'stok.numeric'              => 'Stok harus berupa angka',
            'id_rak.required'           => 'Rak Buku tidak boleh kosong',
            'id_rak.numeric'            => 'Rak Buku harus berupa angka'
        ];
    }
}
