<?php namespace EditorialWeb\Http\Controllers;
use EditorialWeb\Http\Controllers\Controller;
use EditorialWeb\Http\Requests\EditarPerfilRequest;
use Illuminate\Support\Facades\Auth;
use EditorialWeb\Http\Requests\EditarPerfilUsuarioRequest;
use EditorialWeb\Representante;
use EditorialWeb\User;
use EditorialWeb\Http\Requests\CambioRolRequest;
use Validator;
use EditorialWeb\Http\Requests\RegistroRequest;
use EditorialWeb\Http\Requests\RegistrarEmpleadoRequest;
use DB;
class RepresentanteController extends Controller {
    public function __construct(){
        $this->middleware('auth');
    }

    public function getRegistrarEmpleado(){return view('empleados.registrar');}
    
    public function postRegistrarEmpleado(RegistrarEmpleadoRequest $request){
       /*  EditorialWeb\User::create([
            'name' => 'Luis Correa',
            'email' => 'alberto13711@gmail.com',
            'password' => bcrypt('luiscorrea13711'),
            'estado' => 1
        ]); */
                DB::table('users')->insert([
    			'name' => $request->get('name'),
    			'email' => $request->get('email'),
    			'password' => bcrypt($request->get('password')),
                'estado' => 2
    			]);
//        Auth::login($this->create($request->all()));
        //return view('inicio');
        return redirect('/home');
    }


    public function getEditarPerfil(){ return view('representante.editar-perfil'); }
    public function postEditarPerfil(EditarPerfilUsuarioRequest $request){
        $usuario= Auth::user();
        $usuario->name=$request->get('name');
        if($request->has('password')){ 
            $usuario->password = bcrypt($request->get('password'));
        }
        /* if($request->has('pregunta')){
            $usuario->pregunta = $request->get('pregunta');
            $usuario->respuesta = $request->get('respuesta');
        } */
        $usuario->save();
	return redirect('/home');
    }
    //validado/representante
    public function getRol(){
        return view('representante.roles',['representantes'=>$representantes=User::all()]);
    }
    public function postRol(CambioRolRequest $request){
        $representante=Representante::find($request->get('id'));
        $representante->admin=$request->get('selector');
        $representante->save();
        return view('representante.roles',['representantes'=>$representantes=User::all()]);
    }
    public function missingMethod($parameters = array()){ abort(404); } 
}
