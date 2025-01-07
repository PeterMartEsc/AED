<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthApiController extends Controller
{
    public function register(Request $request)
    {
        $user = Usuario::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'rol' => 'usuario'
        ]);
        return auth('api')->login($user);
    }
    public function login(Request $request)
    {
        $nom = $request->input('nombre');
        $pass = $request->input('password');
        $user = Usuario::where('nombre', '=', $nom)
            ->first();
        if (isset($user)) {
            $usuarioname = $user['nombre'];
            $usuariohashpass = $user['password'];
            if (Hash::check($pass, $usuariohashpass)) {
                $token = JWTAuth::fromUser($user);
                return $token;
            } else {
                return response()
                    ->json(['error' => 'Unauthorized', $nom => $pass], 401);
            }
        } else {
            return response()
                ->json(['error' => 'User not found', $user => $pass], 401);
        }
    }
}
