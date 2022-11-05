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

        //get my patients
        $patients = auth()->user()->doctor->patients->sortBy('name');
        //return view with patients
        return view('patient.index', ['patients' => $patients]);
    }

    public function store(PatientRequest $request)
    {
        $request->validated();      
        $user = auth()->user();
        $patient = Patient::create([
            'doctor_id' => $user->id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'dni' => $request->dni,
            'birthday' => $request->birthday,
        ]);
        return redirect('/patient')->with('success', 'Paciente creado correctamente.');
    }

    public function edit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:75',
            'phone' => 'string|max:9',
            'dni' => 'required|string|max:8|unique:patients,dni,' . $request->id,
            'birthday' => 'date',           
        ], [
            'name.required' => 'El nombre es obligatorio',
            'name.max' => 'El nombre debe tener máximo 75 caracteres',
            'phone.max' => 'El teléfono debe tener máximo 9 caracteres',
            'phone.string' => 'El teléfono debe tener el formato correcto',
            'dni.max' => 'El DNI debe tener máximo 25 caracteres',
            'dni.unique' => 'El DNI ya existe',
            'birthday.date' => 'La fecha de nacimiento debe tener el formato correcto',
        ]);

        //update patient
        Patient::find($request->id)->update($request->all());
        return redirect('/patient')->with('success', 'Paciente actualizado correctamente.');
    }

    public function destroy(Request $request)
    {
        $patient = Patient::find($request->id);
        $patient->delete();
        return redirect('/patient')->with('success', 'Paciente eliminado correctamente.');
    }   
}