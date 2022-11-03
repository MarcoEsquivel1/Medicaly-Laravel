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
            'surname' => 'required|string|max:75',
            'phone' => 'string|max:9',
            'dni' => 'string|max:25|unique:patients,dni',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es obligatorio',
            'name.max' => 'El nombre debe tener máximo 75 caracteres',
            'surname.required' => 'El apellido es obligatorio',
            'surname.max' => 'El apellido debe tener máximo 75 caracteres',
            'phone.max' => 'El teléfono debe tener máximo 9 caracteres',
            'phone.string' => 'El teléfono debe tener el formato correcto',
            'dni.max' => 'El DNI debe tener máximo 25 caracteres',
            'dni.unique' => 'El DNI ya existe',
        ];
    }
}
