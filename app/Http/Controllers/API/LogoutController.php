<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    //
    public function logout(Request $request)
    {
        //validate if request has bearer token and token exists in database then delete token
        if ($request->bearerToken() && $request->user()) {
            $request->user()->tokens()->delete();

            return response()->json([
                'message' => 'Sesión cerrada correctamente.',
                'status' => 200,
                'data' => []
            ], 200);
        }else{
            return response()->json([
                'message' => 'No se pudo cerrar sesión.',
                'status' => 422,
                'data' => []
            ], 200);
        }
        
    }
}
