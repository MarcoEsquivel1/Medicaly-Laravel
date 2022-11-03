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
        //use doctor_id to get start_time and end_time
        $doctor = Doctor::find($this->doctor_id);
        //format start_time and end_time to compare with time
        $start_time = date('H:i', strtotime($doctor->start_time));
        $end_time = date('H:i', strtotime($doctor->end_time));
        return [
            'patient_id' => 'required|integer|exists:patients,id',
            'doctor_id' => 'required|integer|exists:doctors,id',
            'date' => 'required|date|after:today',
            'time' => 'required|date_format:H:i|after_or_equal:' . $start_time . '|before_or_equal:' . $end_time,
        ];
    }

    public function messages()
    {
        return [
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
        ];
    }
}
