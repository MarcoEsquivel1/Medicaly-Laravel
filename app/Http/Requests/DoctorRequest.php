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
            'name' => 'max:200',
            'start_time' => 'date_format:H:i',
            'end_time' => 'date_format:H:i|after:start_time',
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
            'name.max' => 'El campo nombre debe tener un máximo de 200 caracteres.',
            'start_time.date_format' => 'El campo hora de inicio debe tener el formato HH:MM.',
            'end_time.date_format' => 'El campo hora de fin debe tener el formato HH:MM.',
            'end_time.after' => 'El campo hora de fin debe ser mayor al campo hora de inicio.',
        ];
    }

}
