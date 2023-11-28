<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\AppointmentRequest;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    //
    public function index(Request $request)
    {
        //validate if request has bearer token and token exists in database
        if ($request->bearerToken() && $request->user()) {
            //get my appointments
            $appointments = $request->user()->doctor->appointments->sortBy('date')->values()->all();
            //format time
            foreach ($appointments as $appointment) {
                $appointment->time = date('H:i', strtotime($appointment->time));
            }
            //return view with appointments
            return response()->json([
                'message' => 'Citas obtenidas correctamente.',
                'status' => 200,
                'data' => $appointments
            ], 200);
        }else{
            return response()->json([
                'message' => 'No se pudo obtener las citas.',
                'status' => 422,
                'data' => []
            ], 422);
        }
    }
    
    public function store(AppointmentRequest $request)
    {
        //validate if request has bearer token and token exists in database
        if ($request->bearerToken() && $request->user()) {
            //validate request
            $validated = $request->validated();
            //if error validation
            if (isset($validated['error'])) {
                return response()->json([
                    'message' => 'Error en la validación de datos',
                    'status' => 422,
                    'data' => $validated['error']
                ], 422);
            }
            //if success validation create appointment
            $appointment = $request->user()->doctor->appointments()->create($validated);
            //get my appointments and return with appointments
            $appointments = $request->user()->doctor->appointments->sortBy('date')->values()->all();
            //format time
            foreach ($appointments as $appointment) {
                $appointment->time = date('H:i', strtotime($appointment->time));
            }
            return response()->json([
                'message' => 'Cita creada correctamente.',
                'status' => 200,
                'data' => $appointments
            ], 200);
        }else{
            return response()->json([
                'message' => 'No se pudo crear la cita.',
                'status' => 422,
                'data' => []
            ], 422);
        }
    }

    public function edit(Request $request){
        //validate if request has bearer token and token exists in database
        if ($request->bearerToken() && $request->user()) {
            //get appointment
            $validated = $request->validate([
                'id' => 'required|integer|exists:appointments,id'
            ], [
                'id.required' => 'La cita es requerida.',
                'id.integer' => 'Error al obtener el codigo de la cita.',
                'id.exists' => 'La cita no existe.'
            ]);

            if(isset($validated['error'])){
                return response()->json([
                    'message' => 'No se pudo obtener la cita.',
                    'status' => 422,
                    'data' => $validated['error']
                ], 422);
            }

            $start_time = date('H:i', strtotime($request->user()->doctor->start_time));
            $end_time = date('H:i', strtotime($request->user()->doctor->end_time));

            $validated = $request->validate([
                'patient_id' => 'integer|exists:patients,id',
                'date' => 'date|after_or_equal:today',
                'time' => 'date_format:H:i|after_or_equal:'.$start_time.'|before_or_equal:'.$end_time,
                'comment' => 'string|max:255|nullable',
                'done' => 'boolean',
            ], [
                'patient_id.integer' => 'Error al obtener el codigo del paciente.',
                'patient_id.exists' => 'El paciente no existe.',
                'date.date' => 'Error al obtener la fecha.',
                'date.after_or_equal' => 'La fecha debe ser mayor o igual a la fecha actual.',
                'time.date_format' => 'Error al obtener la hora.',
                'time.after_or_equal' => 'La hora debe ser mayor o igual a la hora de inicio de atención.',
                'time.before_or_equal' => 'La hora debe ser menor o igual a la hora de fin de atención.',
                'comment.string' => 'Error al obtener el comentario.',
                'comment.max' => 'El comentario debe tener máximo 255 caracteres.',
                'done.boolean' => 'Error al obtener el estado de la cita.',
            ]);

            if(isset($validated['error'])){
                return response()->json([
                    'message' => 'No se pudo actualizar la cita.',
                    'status' => 422,
                    'data' => $validated['error']
                ], 422);
            }

            $appointment = $request->user()->doctor->appointments()->find($request->id);
            $appointment->update($validated);

            $appointments = $request->user()->doctor->appointments->sortBy('date')->values()->all();
            //format time
            foreach ($appointments as $appointment) {
                $appointment->time = date('H:i', strtotime($appointment->time));
            }

            return response()->json([
                'message' => 'Cita actualizada correctamente.',
                'status' => 200,
                'data' => $appointments
            ], 200);
        }else{
            return response()->json([
                'message' => 'No se pudo obtener la cita.',
                'status' => 422,
                'data' => []
            ], 422);
        }
    }

    public function destroy(Request $request){
        //validate if request has bearer token and token exists in database
        if ($request->bearerToken() && $request->user()) {
            //get appointment
            $validated = $request->validate([
                'id' => 'required|integer|exists:appointments,id'
            ], [
                'id.required' => 'La cita es requerida.',
                'id.integer' => 'Error al obtener el codigo de la cita.',
                'id.exists' => 'La cita no existe.'
            ]);

            if(isset($validated['error'])){
                return response()->json([
                    'message' => 'No se pudo obtener la cita.',
                    'status' => 422,
                    'data' => $validated['error']
                ], 422);
            }

            $appointment = $request->user()->doctor->appointments()->find($request->id);
            $appointment->delete();

            $appointments = $request->user()->doctor->appointments->sortBy('date')->values()->all();
            //format time
            foreach ($appointments as $appointment) {
                $appointment->time = date('H:i', strtotime($appointment->time));
            }

            return response()->json([
                'message' => 'Cita eliminada correctamente.',
                'status' => 200,
                'data' => $appointments
            ], 200);
        }else{
            return response()->json([
                'message' => 'No se pudo obtener la cita.',
                'status' => 422,
                'data' => []
            ], 422);
        }
    }
}
