<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function login(LoginRequest $request)
    {
        $credentials = $request->getCredentials();
        if(!Auth::validate($credentials)) {
            return response()->json([
                'message' => 'Credenciales incorrectas',
                'status' => 422,
                'data' => []
            ], 422);
        }

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        $token = $user->createToken('auth_token')->plainTextToken;
        
        return response()->json([
            'message' => 'Inicio de sesión exitoso',
            'status' => 200,
            'data' => [
                'access_token' => $token,
                'token_type' => 'Bearer',
            ]
        ], 200);
    }
}
