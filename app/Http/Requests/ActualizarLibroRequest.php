<?php namespace EditorialWeb\Http\Requests;

use EditorialWeb\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;
class ActualizarLibroRequest extends Request {
    public function authorize(){
        $user = Auth::user();
        if($user){
            return true;
        }
        return false;
    }
    public function rules(){
        return  ['id'=>'required',
        'nombre' => 'required',
        'descripcion'=>'required',
        'cantidad'=>'required',
        'precio'=>'required',
	'imagen' => 'required|image|max:20000'];
    }
}
