<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return response()->json(['usuarios' => $users], 200);
    }
    
    public function register(UserRequest $request){
    $user = User::create([
        'nombre' => $request->nombre,
        'apellido_paterno' => $request->apellido_paterno,
        'apellido_materno' => $request->apellido_materno,
        'telefono' => $request->telefono,
        'domicilio' => $request->domicilio,
        'email' => $request->email,
        'password' => Hash::make($request->password)
    ]);

    $token = JWTAuth::fromUser($user);

    return response()->json(['usuario' => $user, 'token' => $token], 200);
    }

    public function login(LoginRequest $request){
        $credencials = $request->only('email', 'password');

        try{
            if(!$token = JWTAuth::attempt($credencials)){
                return response()->json(['ERROR' => 'CREDENCIALES INVALIDAS']);
            }
        }catch(JWTException $e){
            return response()->json(['ERROR' => 'NOT CREATE TOKEN'], 500);
        }

        return response()->json(['token' => $token], 200);
    }
}
