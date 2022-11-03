<?php

namespace App\Http\Controllers;

use App\Http\Requests\AppointmentRequest;
use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Doctor;

class AppointmentController extends Controller
{
    //
    public function index()
    {
        if (!auth()->check()) {
            return redirect('/login');
        }
        $appointments = Appointment::all()->sortBy('id');
        $patients = Patient::all();
        $doctors = Doctor::all();
        //format appointments time
        foreach ($appointments as $appointment) {
            $appointment->time = date('H:i', strtotime($appointment->time));
        }
        //format doctors start_time and end_time
        foreach ($doctors as $doctor) {
            $doctor->start_time = date('H:i', strtotime($doctor->start_time));
            $doctor->end_time = date('H:i', strtotime($doctor->end_time));
        }
        return view('appointment.index', ['appointments' => $appointments, 'patients' => $patients, 'doctors' => $doctors]);
    }

    public function store(AppointmentRequest $request)
    {
        $appointment = Appointment::create($request->validated());
        return redirect('/appointment')->with('success', 'Cita creada correctamente.');
    }

    public function edit(Request $request)
    {
        //get doctor start_time and end_time
        $doctor = Doctor::find($request->doctor_id);
        $start_time = date('H:i', strtotime($doctor->start_time));
        $end_time = date('H:i', strtotime($doctor->end_time));
        
        $request->validate([
            'patient_id' => 'required|integer|exists:patients,id',
            'doctor_id' => 'required|integer|exists:doctors,id',
            'date' => 'required|date|after:today',
            'time' => 'required|date_format:H:i|after_or_equal:' . $start_time . '|before_or_equal:' . $end_time,
        ], [
            'patient_id.required' => 'El paciente es obligatorio',
            'patient_id.integer' => 'El paciente debe ser un número',
            'patient_id.exists' => 'El paciente no existe',
            'doctor_id.required' => 'El doctor es obligatorio',
            'doctor_id.integer' => 'El doctor debe ser un número',
            'doctor_id.exists' => 'El doctor no existe',
            'date.required' => 'La fecha es obligatoria',
            'date.date' => 'La fecha debe tener el formato correcto',
            'date.after' => 'La fecha debe ser posterior a hoy',
            'time.required' => 'La hora es obligatoria',
            'time.date_format' => 'La hora debe tener el formato correcto',
            'time.after_or_equal' => 'La hora debe ser posterior o igual a la hora de entrada del doctor',
            'time.before_or_equal' => 'La hora debe ser anterior o igual a la hora de salida del doctor',
        ]);

        $appointment = Appointment::find($request->id);
        $appointment->patient_id = $request->patient_id;
        $appointment->doctor_id = $request->doctor_id;
        $appointment->date = $request->date;
        $appointment->time = $request->time;
        $appointment->save();
        return redirect('/appointment')->with('success', 'Cita editada correctamente.');
    }

    public function destroy (Request $request)
    {
        $appointment = Appointment::find($request->id);
        $appointment->delete();
        return redirect('/appointment')->with('success', 'Cita eliminada correctamente.');
    }
}
