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


