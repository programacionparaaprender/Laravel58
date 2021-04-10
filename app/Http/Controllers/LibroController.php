<?php namespace EditorialWeb\Http\Controllers;
//use EditorialWeb\Http\Requests;
use EditorialWeb\Http\Controllers\Controller;
//use Illuminate\Http\Request;
use EditorialWeb\Libro;
use EditorialWeb\LibroAutor;
use EditorialWeb\Pedido;
use EditorialWeb\Linea;
use EditorialWeb\Http\Requests\CrearLibroRequest;
use EditorialWeb\Http\Requests\ActualizarLibroRequest;
use Carbon\Carbon;
class LibroController extends Controller {
    public function getIndex(){
        $libros = Libro::paginate();
        return view('libros.mostrar-libros',['libros'=>$libros]);
    }
    public function getCreate(){ return view('libros.crear-libro'); }
    public function postCreate(CrearLibroRequest $request){
        $nombre = $request->get('nombre');
        $descripcion = $request->get('descripcion');
        $cantidad = $request->get('cantidad');
        $precio = $request->get('precio');
        $imagen = $request->file('imagen');
        $ruta = 'img/';
        $nom = sha1(Carbon::now()).'.'.$imagen->guessExtension();
        $imagen->move(getcwd().$ruta, $nom);
        Libro::create(['nombre'=>$nombre, 'descripcion'=>$descripcion,
            'cantidad'=>$cantidad,'ruta'=>$ruta.$nom,'precio'=>$precio]);
        
        return redirect('/libros');
    }

    public function getActualizar($id){
        $libro = Libro::find($id);
        return view('libros.edit', ['libro' => $libro]);
    }
    public function postActualizar(ActualizarLibroRequest $request){
        $libro =Libro::find($request->get('id'));
        $libro->nombre = $request->get('nombre');
        $libro->descripcion = $request->get('descripcion');
        $libro->cantidad = $request->get('cantidad');
        $libro->precio = $request->get('precio');
        $imagen = $request->file('imagen');
        //al actualizar si es requerida la barra si no
        //crea una carpeta publicimg/
        $ruta = '/img/';
        $nom = sha1(Carbon::now()).'.'.$imagen->guessExtension();
        $imagen->move(getcwd().$ruta, $nom);

        $libro->ruta = $ruta.$nom;
        $libro->save();
        return redirect('/libros');
    }

    public function getDestruir($id){
        $idpedido = null;
        foreach(Linea::all()as $linea){
            if($id == $linea->idlibro){
                $idpedido = $linea->idpedido;
                $linea->delete();
                $linea->save();  
            }
        }
        if($idpedido!=null){
            foreach(Pedido::all()as $pedido){
                if($idpedido == $pedido->id){
                    $pedido->delete();
                    $pedido->save();  
                }
            }
        }
        $libro = Libro::find($id);
        $libro->delete();
        $libro->save();
        $libros = Libro::all();
        return view('libros.mostrar-libros',['libros'=>$libros]);
    }
}
