<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\User;

class RegisterController extends Controller
{
    //
    public function show()
    {
        if (auth()->check()) {
            return redirect('/home');
        }
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        $user = User::create($request->validated());
        //create doctor 
        $user->doctor()->create([
            'name' => 'null',
            'user_id' => $user->id,
        ]);
        return redirect('/login')->with('success', 'Cuenta creada correctamente, Por favor inicia sesión.');
    }
}
