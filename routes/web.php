<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

$json = array('value1', 'value2');

Route::get('/json', function () {
    $json2 = array();
    $json2 = json_encode($json);
    return $json2;
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('post', 'PostController');


Route::get('/post/eliminar/{id}', 'PostController@eliminar');

//Route::controller('pedidos','PedidoController');
Route::get('pedidos/', 'PedidoController@getIndex');
Route::get('/pedidos/compra', 'PedidoController@getCompra');
Route::get('/pedidos/factura/{id}', 'PedidoController@getFactura');
Route::get('/pedidos/factura2/{id}', 'PedidoController@getFactura2');
Route::get('/pedidos/compra/{id}', 'PedidoController@getCompra');
Route::get('/pedidos/notificar/{id}', 'PedidoController@getNotificar($id)');
Route::post('/pedidos/notificar/', 'PedidoController@postNotificar');
Route::get('/pedidos/actualizar/{id}', 'PedidoController@getActualizar');
Route::post('/pedidos/actualizar/', 'PedidoController@postActualizar');
Route::get('/pedidos/mostrarrepresentante/{id}', 'PedidoController@getMostrarRepresentante');




Route::get('libros/', 'LibroController@getIndex');
Route::get('libros/create', 'LibroController@getCreate');
Route::post('libros/create', 'LibroController@postCreate');
Route::get('libros/actualizar/{id}', 'LibroController@getActualizar');
Route::post('libros/actualizar', 'LibroController@postActualizar');
Route::get('libros/destruir/{id}', 'LibroController@getDestruir');


Route::get('validado/representante/editar-perfil', 'RepresentanteController@getEditarPerfil');
Route::post('validado/representante/editar-perfil', 'RepresentanteController@postEditarPerfil');
Route::get('validado/representante/rol', 'RepresentanteController@getRol');
Route::post('validado/representante/rol', 'RepresentanteController@postRol');


Route::get('validado/registrar-empleado', 'RepresentanteController@getRegistrarEmpleado');

Route::post('validado/registrar-empleado', 'RepresentanteController@postRegistrarEmpleado');


Route::get('carrito/', 'CarritoController@getIndex');
Route::get('carrito/procesar', 'CarritoController@getProcesar');
Route::get('carrito/destruir', 'CarritoController@getDestruir');
Route::post('carrito/destruir', 'CarritoController@postIndex');


Route::get('reportes/', 'ReporteController@getIndex');
Route::get('reportes/pedidos', 'ReporteController@getPedidos');

Route::get('email/', 'EmailController@getIndex');
Route::get('email/prueba', 'EmailController@getPrueba');


/* Route::controllers([
    'validacion' => 'Validacion\ValidacionController',
    'validado/representante' => 'RepresentanteController',
    'validado' => 'InicioController',
    'libros' => 'LibroController',
    'carrito'=> 'CarritoController',
    'reportes'=> 'ReporteController',
    'pedidos'=>'PedidoController',
    'busqueda'=>'BusquedaController',
    'emails'=>'EmailController',
    'excel'=>'ExcelController',
    'prueba' => 'PruebaController',
    '/' => 'BienvenidaController'
]); */


