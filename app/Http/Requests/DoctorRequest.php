<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoctorRequest extends FormRequest
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
        return [
            //
            'name' => 'required|string|max:75',
            'surname' => 'required|string|max:75',
            'speciality_id' => 'required|integer|exists:specialities,id',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages()
    {
        return [
            'name.required' => 'El nombre es requerido', 
            'name.string' => 'El nombre debe ser una cadena de texto',
            'name.max' => 'El nombre debe tener como máximo 75 caracteres',
            'surname.required' => 'El apellido es requerido',
            'surname.string' => 'El apellido debe ser una cadena de texto',
            'surname.max' => 'El apellido debe tener como máximo 75 caracteres',
            'speciality_id.required' => 'La especialidad es requerida',
            'speciality_id.integer' => 'La especialidad debe ser un número entero',
            'speciality_id.exists' => 'La especialidad no existe',
            'start_time.required' => 'La hora de inicio es requerida',
            'start_time.date_format' => 'La hora de inicio debe tener el formato HH:mm',
            'end_time.required' => 'La hora de fin es requerida',
            'end_time.date_format' => 'La hora de fin debe tener el formato HH:mm',
            'end_time.after' => 'La hora de fin debe ser mayor a la hora de inicio',
        ];
    }
}
