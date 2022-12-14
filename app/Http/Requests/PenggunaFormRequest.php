<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PenggunaFormRequest extends FormRequest
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
            "nama"       => 'required',
            "email"    => 'required',
            "address"   => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nama.required'     => 'Please Enter Name',
            'email.required' => 'Please Enter Address',
            'password.required' => 'Please Enter PhNumber'

        ];
    }
}
