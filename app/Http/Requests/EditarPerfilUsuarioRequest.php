<?php namespace EditorialWeb\Http\Requests;
use EditorialWeb\Http\Requests\Request;
class EditarPerfilUsuarioRequest extends Request {
    public function authorize(){return true;}
    public function rules(){
            return ['name'=> 'required',
            'password' => 'min:6|confirmed',
            ];
    }
}
