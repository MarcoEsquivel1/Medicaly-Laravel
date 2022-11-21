<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PatientRequest;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    //
    public function index(Request $request)
    {
        //validate if request has bearer token and token exists in database
        if ($request->bearerToken() && $request->user()) {
            //get my patients
            $patients = $request->user()->doctor->patients->sortBy('id');
            //return view with patients
            return response()->json([
                'message' => 'Pacientes obtenidos correctamente.',
                'status' => 200,
                'data' => $patients
            ], 200);
        }else{
            return response()->json([
                'message' => 'No se pudo obtener los pacientes.',
                'status' => 422,
                'data' => []
            ], 422);
        }
    }

    public function store(PatientRequest $request)
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
            //if success validation create patient
            $patient = $request->user()->doctor->patients()->create($validated);
            //get my patients and return with patients
            $patients = $request->user()->doctor->patients->sortBy('id');
            return response()->json([
                'message' => 'Paciente creado correctamente.',
                'status' => 200,
                'data' => $patients
            ], 200);
        }else{
            return response()->json([
                'message' => 'No se pudo crear el paciente.',
                'status' => 422,
                'data' => []
            ], 422);
        }
    }

    public function edit(Request $request)
    {
        //validate if request has bearer token and token exists in database
        if ($request->bearerToken() && $request->user()) {
            //if request has id
            $validated = $request->validate([
                'id' => 'required|integer|exists:patients,id'
            ], [
                'id.required' => 'El paciente es requerido.',
                'id.integer' => 'El error al obtener el codigo del paciente.',
                'id.exists' => 'El paciente no existe.'
            ]);

            //if error validation
            if (isset($validated['errors'])) {
                return response()->json([
                    'message' => 'No se pudo obtener el paciente.',
                    'status' => 422,
                    'data' => $validated['errors']
                ], 422);
            }

            //if success validation validate patient
            $validated = $request->validate([
                'name' => 'string|max:75',
                'phone' => 'string|max:9',
                'dni' => 'string|max:8|unique:patients,dni,' . $request->id,
                'birthday' => 'date',
            ], [
                'name.string' => 'El nombre debe ser una cadena de texto.',
                'name.max' => 'El nombre debe tener máximo 75 caracteres.',
                'phone.string' => 'El teléfono debe ser una cadena de texto.',
                'phone.max' => 'El teléfono debe tener máximo 9 caracteres.',
                'dni.string' => 'El dni debe ser una cadena de texto.',
                'dni.max' => 'El dni debe tener máximo 8 caracteres.',
                'dni.unique' => 'El dni ya existe.',
                'birthday.date' => 'La fecha de nacimiento debe ser una fecha válida.',
            ]);

            //if error validation

            if (isset($validated['errors'])) {
                return response()->json([
                    'message' => 'No se pudo actualizar el paciente.',
                    'status' => 422,
                    'data' => $validated['errors']
                ], 422);
            }

            //if success validation update patient
            $patient = $request->user()->doctor->patients()->find($request->id);
            $patient->update($validated);
            //get my patients and return with patients
            $patients = $request->user()->doctor->patients->sortBy('id');
            return response()->json([
                'message' => 'Paciente actualizado correctamente.',
                'status' => 200,
                'data' => $patients
            ], 200);

            
        }else{
            return response()->json([
                'message' => 'No se pudo obtener el paciente.',
                'status' => 422,
                'data' => []
            ], 422);
        }
    }

    public function destroy(Request $request)
    {
        //validate if request has bearer token and token exists in database
        if ($request->bearerToken() && $request->user()) {
            //if request has id
            $validated = $request->validate([
                'id' => 'required|integer|exists:patients,id'
            ], [
                'id.required' => 'El paciente es requerido.',
                'id.integer' => 'El error al obtener el codigo del paciente.',
                'id.exists' => 'El paciente no existe.'
            ]);

            //if error validation
            if (isset($validated['errors'])) {
                return response()->json([
                    'message' => 'No se pudo eliminar el paciente.',
                    'status' => 422,
                    'data' => $validated['errors']
                ], 422);
            }

            //if success validation delete patient
            $patient = $request->user()->doctor->patients()->find($request->id);
            $patient->delete();
            //get my patients and return with patients
            $patients = $request->user()->doctor->patients->sortBy('id');
            return response()->json([
                'message' => 'Paciente eliminado correctamente.',
                'status' => 200,
                'data' => $patients
            ], 200);
        }else{
            return response()->json([
                'message' => 'No se pudo eliminar el paciente.',
                'status' => 422,
                'data' => []
            ], 422);
        }
    }
}
