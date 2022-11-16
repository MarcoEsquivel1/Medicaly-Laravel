<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    //
    public function show(Request $request)
    {
        if ($request->bearerToken() && $request->user()) {
            $doctor = $request->user()->doctor;
            if ($doctor->start_time != null) {
                $doctor->start_time = date('H:i', strtotime($doctor->start_time));
            }
            if ($doctor->end_time != null) {
                $doctor->end_time = date('H:i', strtotime($doctor->end_time));
            }
            return response()->json([
                'message' => 'Datos obtenidos correctamente.',
                'status' => 200,
                'data' => $doctor
            ], 200);
        }else{
            return response()->json([
                'message' => 'No se pudo obtener la información del doctor.',
                'status' => 422,
                'data' => []
            ], 422);
        }
    }

    public function edit(Request $request)
    {
        if($request->bearerToken() && $request->user()){
            
            $validated = $request->validate([
                'name' => 'max:200',
                'start_time' => 'date_format:H:i',
                'end_time' => 'date_format:H:i|after:start_time',
            ], [
                'name.max' => 'El campo nombre debe tener un máximo de 200 caracteres.',
                'start_time.date_format' => 'El campo hora de inicio debe tener el formato HH:MM.',
                'end_time.date_format' => 'El campo hora de fin debe tener el formato HH:MM.',
                'end_time.after' => 'El campo hora de fin debe ser mayor al campo hora de inicio.',
            ]);

            //if error validation
            if(isset($validated['errors'])){
                return response()->json([
                    'message' => 'Error en la validación de datos',
                    'status' => 422,
                    'data' => $validated['errors']
                ], 422);
            }

            //if validation success
            $doctor = $request->user()->doctor;
            $doctor->update($request->all());

            if ($doctor->start_time != null) {
                $doctor->start_time = date('H:i', strtotime($doctor->start_time));
            }

            if ($doctor->end_time != null) {
                $doctor->end_time = date('H:i', strtotime($doctor->end_time));
            }

            return response()->json([
                'message' => 'Datos del doctor actualizados correctamente.',
                'status' => 200,
                'data' => $doctor
            ], 200);
        }
    }
}
