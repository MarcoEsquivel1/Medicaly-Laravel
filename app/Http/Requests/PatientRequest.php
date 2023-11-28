<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientRequest extends FormRequest
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
            'dni' => 'required|string|max:8',
            'phone' => 'string|max:9',
            'birthday' => 'date',
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
            'name.required' => 'El campo nombre es obligatorio.',
            'name.string' => 'El campo nombre debe ser un texto.',
            'name.max' => 'El campo nombre debe tener un máximo de 75 caracteres.',
            'dni.required' => 'El campo dni es obligatorio.',
            'dni.string' => 'El campo dni debe ser un texto.',
            'dni.max' => 'El campo dni debe tener un máximo de 8 caracteres.',
            'phone.string' => 'El campo teléfono debe ser un texto.',
            'phone.max' => 'El campo teléfono debe tener un máximo de 9 caracteres.',
            'birthday.date' => 'El campo fecha de nacimiento debe ser una fecha.',
        ];
    }
}
