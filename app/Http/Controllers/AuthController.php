<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\User;
use \stdClass;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    
    public function register(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:4|max:16'
        ]);
        
        if($validator->fails()){
            return response()->json(["validate"=>$validator->errors()]);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $this->send_mail($request->email, $request->name);

        $token = $user->createToken('auth_token')->plainTextToken;

        return  response()
                    ->json( [ 'data'=>$user,'access_token' => $token, 'token_type' => 'Bearer' ] );
                    
    }

    public function login(Required $request)
    {
        if(!Auth::attempt($request->only('email', 'password'))){
            
        }
    }

    /* Envios de email para registros de usuarios exitosos */
    private function send_mail(String $email, $name){
        
        $details = [ 'title' => "¡Bienvenido $name ", 
                      'body' => 'Te has registrado con exito a nuestra plataforma'];
        Mail::to($email)->send(new \App\Mail\MyTestMail($details));
        //dd("Correo enviado, por favor verifica tu bandeja.");  
    }

}
