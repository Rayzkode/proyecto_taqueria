<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return response()->json(['usuarios' => $users], 200);
    }
    
    public function register(UserRequest $request)
{
    $rol = $request->input('rol');

    $user = User::create([
        'nombre' => $request->nombre,
        'apellido_paterno' => $request->apellido_paterno,
        'apellido_materno' => $request->apellido_materno,
        'telefono' => $request->telefono,
        'domicilio' => $request->domicilio,
        'email' => $request->email,
        'password' => Hash::make($request->password)
    ]);

    if (!$user) {
        return response()->json(['ERROR' => "No se pudo crear el usuario"], 500);
    }

    if (in_array($rol, ['admin', 'mesero', 'cocinero'])) {
        $user->assignRole($rol);
    } else {
        $user->assignRole('mesero');
    }

    return response()->json(['usuario' => $user], 200);
}


    public function login(Request $request)
    {
        // Lógica para iniciar sesión y verificar credenciales
        if (JWTAuth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = JWTAuth::user();
            $token = JWTAuth::fromUser($user);

            // Retorna el token o cualquier otra información necesaria
            return response()->json(['token' => $token]);
        } else {
            // Credenciales inválidas
            return response()->json(['error' => 'Credenciales inválidas'], 401);
        }
    }
}
