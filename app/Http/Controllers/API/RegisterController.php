<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    //
    public function register(RegisterRequest $request)
    {
        $validated = $request->validated();

        //if error validation
        if (isset($validated['error'])) {
            return response()->json([
                'message' => 'Error en la validación de datos',
                'status' => 422,
                'data' => $validated['error']
            ], 422);
        }

        //if success validation create user
        $user = User::create($validated);

        //create doctor
        $user->doctor()->create([
            'name' => 'Dr',
            'user_id' => $user->id,
        ]);

        return response()->json([
            'message' => 'Cuenta creada correctamente, Por favor inicia sesión.',
            'status' => 200,
            'data' => []
        ], 200);
    }
}
