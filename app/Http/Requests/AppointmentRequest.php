<?php

namespace App\Http\Requests;

use App\Models\Doctor;
use Illuminate\Foundation\Http\FormRequest;

class AppointmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        //get date of El Salvador
        //get doctor
        $doctor = Doctor::find(auth()->user()->doctor->id);
        //format start_time and end_time to compare with time
        $start_time = date('H:i', strtotime($doctor->start_time));
        $end_time = date('H:i', strtotime($doctor->end_time));
        return [
            'patient_id' => 'required|integer|exists:patients,id',
            //date must be today or later
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required|date_format:H:i|after_or_equal:' . $start_time . '|before_or_equal:' . $end_time,
            'comment' => 'max:350|string|nullable',
            'done' => 'boolean',
        ];
    }

    public function messages()
    {
        return [
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
            'comment.max' => 'El comentario debe tener un máximo de 350 caracteres',
            'comment.string' => 'El comentario debe ser un texto',
            'comment.nullable' => 'El comentario es opcional',
            'done.boolean' => 'El campo realizado debe ser un booleano',
        ];
    }
}
