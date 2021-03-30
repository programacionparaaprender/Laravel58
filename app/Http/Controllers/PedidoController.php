<?php namespace EditorialWeb\Http\Controllers;

use EditorialWeb\Http\Controllers\Controller;
use EditorialWeb\Pedido;
use EditorialWeb\Representante;
use EditorialWeb\Libro;
use EditorialWeb\EstadoPedido;
use EditorialWeb\Linea;
use EditorialWeb\User;
use EditorialWeb\Http\Requests\ActualizarPedidoRequest;
use EditorialWeb\Http\Requests\NotificarPedidoRequest;
use App;
use View;
use Gloudemans\Shoppingcart\Facades\Cart;
use Barryvdh\DomPDF\Facade;
use DB;
use Auth;
use Illuminate\Support\Facades\Mail;
class PedidoController extends Controller {
	public function getFacturaVieja($id){
		$pedido = Pedido::find($id);
		$representante = Representante::find($pedido->idrepresentante);
		$lineas = Linea::all()->where('idpedido', $pedido->id);
		Cart::destroy();
		foreach($lineas as $linea){
			$libro = Libro::find($linea->idlibro);
			$id = $libro->id;
			$name = $libro->nombre;
			$qty = $linea->cantidad;
			$price = $libro->precio;
			Cart::add(array('id' => $id, 'name' => $name, 'qty' => $qty, 'price' => $price));
		}
		$productos = Cart::content();
		$total = Cart::total();
		Cart::destroy();
		return view('pdf.factura',['pedido'=>$pedido,'representante'=>$representante,'productos'=>$productos,'total'=>$total]);
	}
	public function getFactura($id){
        if(Auth::user()){
            $pedido = Pedido::find($id);
            $user = User::find($pedido->idusers);
            $lineas = Linea::all()->where('idpedido', $pedido->id);
            $productos = array();
            $total = 0;

            $name = $user->nombre;
            $email = $user->cantidad;
            $usuario = array('name' => $name, 'email' => $email);

            foreach($lineas as $linea){
                $libro = Libro::find($linea->idlibro);
                $id = $libro->id;
                $name = $libro->nombre;
                $qty = $linea->cantidad;
                $price = $libro->precio;
                $total = $price * $qty;
                $producto = array('id' => $id, 'name' => $name, 'qty' => $qty, 'price' => $price, 'total' => $total);
                array_push ( $productos, $producto );
                
            }
            $pdf = App::make('dompdf.wrapper');
            $pdf->loadView('pdf.factura',['user'=>$user,'pedido'=>$pedido,'productos'=>$productos]);
            return $pdf->stream();
            //return $pdf->download('archivo.pdf');
        }else 
            return view('welcome');

	}

    public function getFactura2($id){
        if(Auth::user()){
            $pedido = Pedido::find($id);
            $user = User::find($pedido->idusers);
            $lineas = Linea::all()->where('idpedido', $pedido->id);
            $productos = array();
            $total = 0;

            $name = $user->nombre;
            $email = $user->cantidad;
            $usuario = array('name' => $name, 'email' => $email);

            foreach($lineas as $linea){
                $libro = Libro::find($linea->idlibro);
                $id = $libro->id;
                $name = $libro->nombre;
                $qty = $linea->cantidad;
                $price = $libro->precio;
                $total = $price * $qty;
                $producto = array('id' => $id, 'name' => $name, 'qty' => $qty, 'price' => $price, 'total' => $total);
                array_push ( $productos, $producto );
                
            }
            return view('pdf.factura',['user'=>$user,'pedido'=>$pedido,'productos'=>$productos]);
            
        }else 
            return view('welcome');

	}
//	public function getInvoice2()
//	{
//		$data = $this->getData();
//		$date = date('Y-m-d');
//		$invoice = "2222";
//		$view =  View::make('pdf.invoice', compact(['data'=>$data, 'date'=>$date,'invoice'=>$invoice]))->render();
//		$pdf = App::make('dompdf.wrapper');
//		$pdf->loadHTML($view);
//		return $pdf->stream('invoice');
//	}
//	public function getData()
//	{
//		$data =  [
//		'quantity'      => '1' ,
//		'description'   => 'some ramdom text',
//		'price'   => '500',
//		'total'     => '500'
//				];
//		return $data;
//	}
	
	
    public function getIndex(){
        if(Auth::user()){
//        $posibilidades = DB::table('pedidos')
//                    ->join('estadopedidos', 'pedidos.idpedido', '=', 'estadopedidos.id')
//                    ->select(DB::raw('pedidos.idestado AS idestado,estadopedidos.nombre as nombre'))
//                    ->get();
            return view('pedidos.mostrar-pedidos',['pedidos'=>Pedido::all(),'users'=> User::all(),'estadopedidos'=>  EstadoPedido::all()]);
        }else 
            return view('welcome');
    }
    
    public function getCompra(){
        $usuario= Auth::user();
        $pedidos = DB::table('pedidos')->where('idusers', $usuario->id)->get();
        return view('pedidos.compra',['pedidos'=>$pedidos,'users'=> User::all(),'estadopedidos'=>  EstadoPedido::all()]);
    }
    
    public function getNotificar($id){
        $pedido = Pedido::find($id);
        return view('pedidos.notificar',['pedido'=>$pedido]);
    }
    public function postNotificar(NotificarPedidoRequest $request){
        $pedido = Pedido::find($request->get('id'));
        $NombreBanco=$request->get('NombreBanco');
        $NroOperacion=$request->get('NroOperacion');
        $usuario=Auth::user();
        Mail::send('emails.notificacion',['nombre' => $usuario->nombre,'apellido'=>$usuario->apellido,'correo'=>$usuario->email,'NombreBanco'=>$NombreBanco,'NroOperacion'=>$NroOperacion,'pedido'=>$pedido], function ($message) {
        $message->to('alberto13711@gmail.com','Some Guy')->from('libreriaomega3@gmail.com')->subject('Welcome!');});
        
        //profesora
        Mail::send('emails.notificacion',['nombre' => $usuario->nombre,'apellido'=>$usuario->apellido,'correo'=>$usuario->email,'NombreBanco'=>$NombreBanco,'NroOperacion'=>$NroOperacion,'pedido'=>$pedido], function ($message) {
        $message->to('zuliraisg@gmail.com','Some Guy')->from('libreriaomega3@gmail.com')->subject('Welcome!');});
        
        //colegas
        Mail::send('emails.notificacion',['nombre' => $usuario->nombre,'apellido'=>$usuario->apellido,'correo'=>$usuario->email,'NombreBanco'=>$NombreBanco,'NroOperacion'=>$NroOperacion,'pedido'=>$pedido], function ($message) {
        $message->to('manueldun@gmail.com','Some Guy')->from('libreriaomega3@gmail.com')->subject('Welcome!');});
        Mail::send('emails.notificacion',['nombre' => $usuario->nombre,'apellido'=>$usuario->apellido,'correo'=>$usuario->email,'NombreBanco'=>$NombreBanco,'NroOperacion'=>$NroOperacion,'pedido'=>$pedido], function ($message) {
        $message->to('xygesc@gmail.com','Some Guy')->from('libreriaomega3@gmail.com')->subject('Welcome!');});
        
        
        $usuario= Auth::user();
        $pedidos = DB::table('pedidos')->where('idrepresentante', $usuario->id)->get();
        return view('pedidos.compra',['pedidos'=>$pedidos,'representantes'=> Representante::all(),'estadopedidos'=>  EstadoPedido::all()]);
    }
    public function getActualizar($id){
        $pedido = Pedido::find($id);
        return view('pedidos.actualizar',['pedido'=>$pedido]);
    }
    public function postActualizar(ActualizarPedidoRequest $request){
        $pedido =Pedido::find($request->get('id'));
        $pedido->idestado = $request->get('selector');
        $pedido->save();
        return view('pedidos.mostrar-pedidos',['pedidos'=>Pedido::all(),'representantes'=> Representante::all(),'estadopedidos'=>  EstadoPedido::all()]);
        //return view('pedidos.index',['pedidos'=>Pedido::all(),'representantes'=> Representante::all(),'estadopedidos'=>  EstadoPedido::all()]);
    }
    public function getMostrarRepresentante($id){
        return view('pedidos.mostrar-representante',['representante'=> Representante::find($id)]);
    }
}
