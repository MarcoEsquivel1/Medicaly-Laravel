<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientRequest;
use Illuminate\Http\Request;
use App\Models\Patient;

class PatientController extends Controller
{
    //
    public function index()
    {
        if (!auth()->check()) {
            return redirect('/login');
        }
        $patients = Patient::all()->sortBy('id');
        return view('patient.index', ['patients' => $patients]);
    }

    public function store(PatientRequest $request)
    {
        $patient = Patient::create($request->validated());
        return redirect('/patient')->with('success', 'Paciente creado correctamente.');
    }

    public function edit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:75',
            'surname' => 'required|string|max:75',
            'phone' => 'string|max:9',
            'dni' => 'required|string|max:8|unique:patients,dni,' . $request->id,
        ], [
            'name.required' => 'El nombre es obligatorio',
            'name.max' => 'El nombre debe tener máximo 75 caracteres',
            'surname.required' => 'El apellido es obligatorio',
            'surname.max' => 'El apellido debe tener máximo 75 caracteres',
            'phone.max' => 'El teléfono debe tener máximo 9 caracteres',
            'phone.string' => 'El teléfono debe tener el formato correcto',
            'dni.max' => 'El DNI debe tener máximo 25 caracteres',
            'dni.unique' => 'El DNI ya existe',
        ]);

        $patient = Patient::find($request->id);
        $patient->name = $request->name;
        $patient->surname = $request->surname;
        $patient->phone = $request->phone;
        $patient->dni = $request->dni;
        $patient->save();
        return redirect('/patient')->with('success', 'Paciente actualizado correctamente.');
    }

    public function destroy(Request $request)
    {
        $patient = Patient::find($request->id);
        $patient->delete();
        return redirect('/patient')->with('success', 'Paciente eliminado correctamente.');
    }   
}