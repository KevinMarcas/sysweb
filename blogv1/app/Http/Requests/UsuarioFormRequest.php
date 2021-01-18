<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioFormRequest extends FormRequest
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
            'Nombre'=>'max:40|required',
            'Apellido'=>'max:40|required',
            'NumDocumento'=>'required|digits:8',
            'password'=>'required',
            'email'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'password.required' => 'Debe ingresar una contraseña.',
            'email.required' => 'Debe ingresar un Correo electrónico.',
        ];
    }
}
