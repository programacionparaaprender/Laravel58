<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

use EditorialWeb\User;
use EditorialWeb\Post;
use EditorialWeb\Pedido;

//use Auth;
//http://localhost/LaravelApiMySQL/public/api/users/
Route::get('/users', function () {
    /* if(Auth::user()){ */
        return User::All();
    /* }else{
        return "No tiene permisos";
    } */
});

Route::get('/pedidos', function () {
    /* if(Auth::user()){ */
        return Pedido::All();
    /* }else{
        return "No tiene permisos";
    } */
});


Route::get('/posts', function () {
    /* if(Auth::user()){ */
        return Post::All();
    /* }else{
        return "No tiene permisos";
    } */
});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
