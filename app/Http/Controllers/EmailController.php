<?php

namespace EditorialWeb\Http\Controllers;

use Illuminate\Http\Request;
use EditorialWeb\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
//use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex(){
            //$data = array('name' => "Luis Correa",);
            Mail::send('emails.welcome',['name' => "Novica"], function ($message) {
            //$message->from('libreriaomega3@gmail.com', 'Learning Laravel');
            $message->to('libreriaomega3@gmail.com','Some Guy')->from('libreriaomega3@gmail.com')->subject('Welcome!');
            });
          return "Your email has been sent successfully";

    }
    public function getPrueba(){
        Log::info('El usuario: Luis Correa '.' envio este mensaje: Hola');
        $data = array('name' => "Learning Laravel",);
        Mail::send('emails.welcome' ,$data, function ($message) { 
            $message->from('libreriaomega3@gmail.com', 'Learning Laravel');
            $message->to('alberto13711@gmail.com', 'Hola mundo')->subject('Pruebaaaaaa');
        //Session::flash('message','Correo enviado exitosamente');
        });
        return redirect()->route('/');
    }

}
