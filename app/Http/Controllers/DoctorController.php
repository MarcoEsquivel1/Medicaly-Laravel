<?php

namespace App\Http\Controllers;

use App\Http\Requests\DoctorRequest;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Speciality;


class DoctorController extends Controller
{
    //
    public function index()
    {
        if (!auth()->check()) {
            return redirect('/login');
        }
        
        $specialities = Speciality::all();
        $doctors = Doctor::all()->sortBy('id');
        //format dosctors start_time and end_time
        foreach ($doctors as $doctor) {
            $doctor->start_time = date('H:i', strtotime($doctor->start_time));
            $doctor->end_time = date('H:i', strtotime($doctor->end_time));
        }
        return view('doctor.index', ['doctors' => $doctors, 'specialities' => $specialities]);
    }

    public function store(DoctorRequest $request)
    {
        $doctor = Doctor::create($request->validated());
        return redirect('/doctor')->with('success', 'Doctor creado correctamente.');
    }

    public function edit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:75',
            'surname' => 'required|string|max:75',
            'speciality_id' => 'required|integer|exists:specialities,id',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ], [
            'name.required' => 'El nombre es obligatorio',
            'name.max' => 'El nombre debe tener máximo 75 caracteres',
            'surname.required' => 'El apellido es obligatorio',
            'surname.max' => 'El apellido debe tener máximo 75 caracteres',
            'speciality_id.required' => 'La especialidad es obligatoria',
            'speciality_id.integer' => 'La especialidad debe ser un número',
            'speciality_id.exists' => 'La especialidad no existe',
            'start_time.required' => 'La hora de entrada es obligatoria',
            'start_time.date_format' => 'La hora de entrada debe tener el formato correcto',
            'end_time.required' => 'La hora de salida es obligatoria',
            'end_time.date_format' => 'La hora de salida debe tener el formato correcto',
            'end_time.after' => 'La hora de salida debe ser posterior a la hora de entrada',
        ]);

        $doctor = Doctor::find($request->id);
        $doctor->name = $request->name;
        $doctor->surname = $request->surname;
        $doctor->speciality_id = $request->speciality_id;
        $doctor->start_time = $request->start_time;
        $doctor->end_time = $request->end_time;
        $doctor->save();

        $horainicio = $request->start_time;
        $horafin = $request->end_time;
        return redirect('/doctor')->with('success', 'Hora de inicio: '.$horainicio.' Hora de fin: '.$horafin);
    }

    public function destroy(Request $request)
    {
        $doctor = Doctor::find($request->id);
        $doctor->delete();
        return redirect('/doctor')->with('success', 'Doctor eliminado correctamente.');
    }
}
