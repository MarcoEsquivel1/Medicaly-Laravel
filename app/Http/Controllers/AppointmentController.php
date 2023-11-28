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
        
        //get my patients
        $patients = Patient::where('doctor_id', auth()->user()->id)->get()->sortBy('name');
        //get my appointments
        $appointments = auth()->user()->doctor->appointments->sortBy('date');
        //format time
        foreach ($appointments as $appointment) {
            $appointment->time = date('H:i', strtotime($appointment->time));
        }
        //get my doctor
        $doctor = auth()->user()->doctor;
        //format doctor start_time and end_time
        /* $doctor->start_time = date('H:i', strtotime($doctor->start_time));
        $doctor->end_time = date('H:i', strtotime($doctor->end_time)); */
        return view('appointment.index', ['appointments' => $appointments, 'patients' => $patients/* , 'doctor' => $doctor */]);
    }

    public function store(AppointmentRequest $request)
    {
        $request->validated();
        //add doctor_id to request
        $request->merge(['doctor_id' => auth()->user()->doctor->id]);
        //create appointment
        Appointment::create($request->all());
        return redirect('/appointment')->with('success', 'Cita creada correctamente.');
    }

    public function edit(Request $request)
    {
        //if done and btn-done
        if ($request->has('done') && $request->has('btn-done')) {
            //update done
            $done = $request->input('done');
            Appointment::find($request->id)->update(['done' => !$done]);
            return redirect('/appointment')->with('success', 'Estado actualizado correctamente.');
        }
        

        //get doctor
        $doctor = auth()->user()->doctor;
        $start_time = date('H:i', strtotime($doctor->start_time));
        $end_time = date('H:i', strtotime($doctor->end_time));
        
        $request->validate([
            'patient_id' => 'required|integer|exists:patients,id',
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required|date_format:H:i|after_or_equal:' . $start_time . '|before_or_equal:' . $end_time,
            'comment' => 'string|max:255|nullable',
            'done' => 'boolean',
        ], [
            'patient_id.required' => 'El paciente es obligatorio',
            'patient_id.integer' => 'El paciente debe ser un número',
            'patient_id.exists' => 'El paciente no existe',
            'date.required' => 'La fecha es obligatoria',
            'date.date' => 'La fecha debe tener el formato correcto',
            'date.after_or_equal' => 'La fecha debe ser posterior o igual a hoy',
            'time.required' => 'La hora es obligatoria',
            'time.date_format' => 'La hora debe tener el formato correcto',
            'time.after_or_equal' => 'La hora debe ser posterior o igual a la hora de entrada del doctor',
            'time.before_or_equal' => 'La hora debe ser anterior o igual a la hora de salida del doctor',
            'comment.string' => 'El comentario debe ser un texto',
            'comment.max' => 'El comentario no puede tener más de 255 caracteres',
            'comment.nullable' => 'El comentario es opcional',
            'done.boolean' => 'El estado debe ser un valor booleano',
        ]);

        //update appointment
        $appointment = Appointment::find($request->id);
        $appointment->patient_id = $request->patient_id;
        $appointment->date = $request->date;
        $appointment->time = $request->time;
        $appointment->comment = $request->comment;
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
