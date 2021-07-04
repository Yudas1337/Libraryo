<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewPassRequest extends FormRequest
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
            'oldPass'               => 'required',
            'newPass'               => 'required|min:6|confirmed',
            'newPass_confirmation' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'oldPass.required'                  => 'Password lama tidak boleh kosong',
            'newPass.required'                  => 'Password baru tidak boleh kosong',
            'newPass.min'                       => 'Password minimal 6 karakter',
            'newPass.confirmed'                 => 'Ulangi Password tidak cocok',
            'newPass_confirmation.required'    => 'Ulangi Password tidak boleh kosong'
        ];
    }
}
