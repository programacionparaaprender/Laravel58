<?php namespace EditorialWeb\Http\Requests;

use EditorialWeb\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;
class CrearLibroRequest extends Request {
    public function authorize(){
        $user = Auth::user();
        if($user){
            return true;
        }
        return false;
    }
    public function rules(){
        /* 
        'idautor' => 'required|exists:autores,id',
        'anio'=>'required',
        'idgenero'=>'required|exists:generos,id',
        'idtipoed'=>'required|exists:tipoediciones,id',
        'cantpaginas'=>'required',
        'edicion'=>'required',
        'idnivel'=>'required|exists:niveles,id', */
        return  [
        'nombre' => 'required',
        'descripcion'=>'required',
        'cantidad'=>'required',
        'precio'=>'required',
	'imagen' => 'required|image|max:20000'];
    }
}