<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SpecialityRequest;
use App\Models\Speciality;

class SpecialityController extends Controller
{
    //
    public function index()
    {
        if (!auth()->check()) {
            return redirect('/login');
        }
        $specialities = Speciality::all()->sortBy('id');
        return view('speciality.index', ['specialities' => $specialities]);
    }

    public function store(SpecialityRequest $request)
    {
        $speciality = Speciality::create($request->validated());
        return redirect('/speciality')->with('success', 'Especialidad creada correctamente.');
    }

    public function edit(Request $request){
        //validate name with error message
        $request->validate([
            'specialityName' => 'required|string|max:35',
        ], [
            'specialityName.required' => 'El campo especialidad es obligatorio.',
            'specialityName.string' => 'El campo especialidad debe ser una cadena de texto.',
            'specialityName.max' => 'El campo especialidad debe tener un máximo de 20 caracteres.',
        ]);
        //update name
        $speciality = Speciality::find($request->id);
        $speciality->specialityName = $request->specialityName;
        $speciality->save();
        return redirect('/speciality')->with('success', 'Especialidad actualizada correctamente.');
    }

    public function destroy(Request $request){
        $speciality = Speciality::find($request->id);
        $speciality->delete();
        return redirect('/speciality')->with('success', 'Especialidad eliminada correctamente.');
    }
}
