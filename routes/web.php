<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

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

Route::get('send-mail', function () {

    try {
        
        $details = [
            'title' => '¡Bienvenido!',
            'body' => 'Te has registrado con exito a nuestra plataforma',
        ];

        Mail::to('embuelvasolivo@gmail.com')->send(new \App\Mail\MyTestMail($details));

        dd("Correo enviado, por favor verifica tu bandeja.");
    } catch (\Throwable $th) {
        return $th;
    }
    
});
