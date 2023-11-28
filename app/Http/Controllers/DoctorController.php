<?php

namespace App\Http\Controllers;

use App\Http\Requests\DoctorRequest;
use Illuminate\Http\Request;
use App\Models\Doctor;


class DoctorController extends Controller
{
    //
    public function index()
    {
        if (!auth()->check()) {
            return redirect('/login');
        }
        //get my doctor
        $doctor = auth()->user()->doctor;
        //if start_time or end_time is not null then format it
        if ($doctor->start_time != null) {
            $doctor->start_time = date('H:i', strtotime($doctor->start_time));
        }
        if ($doctor->end_time != null) {
            $doctor->end_time = date('H:i', strtotime($doctor->end_time));
        }
        //return view with doctor
        return view('doctor.index', ['doctor' => $doctor]);
    }

    public function edit(Request $request)
    {
        $request->validate([
            'name' => 'max:200',
            'start_time' => 'date_format:H:i',
            'end_time' => 'date_format:H:i|after:start_time',
        ], [
            'name.max' => 'El campo nombre debe tener un máximo de 200 caracteres.',
            'start_time.date_format' => 'El campo hora de inicio debe tener el formato HH:MM.',
            'end_time.date_format' => 'El campo hora de fin debe tener el formato HH:MM.',
            'end_time.after' => 'El campo hora de fin debe ser mayor al campo hora de inicio.',
        ]);
        //update doctor
        auth()->user()->doctor->update($request->all());
        //get doctor
        $doctor = auth()->user()->doctor;
        //if start_time or end_time is not null then format it
        if ($doctor->start_time != null) {
            $doctor->start_time = date('H:i', strtotime($doctor->start_time));
        }
        if ($doctor->end_time != null) {
            $doctor->end_time = date('H:i', strtotime($doctor->end_time));
        }
        //return view with doctor
        return view('doctor.index', ['doctor' => $doctor]);
    }
}
