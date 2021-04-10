<?php

namespace EditorialWeb\Http\Requests;

use EditorialWeb\Http\Requests\Request;

class RegistrarEmpleadoRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(){
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:representantes',
            'password' => 'required|confirmed|min:6',

        ];
    }
}
