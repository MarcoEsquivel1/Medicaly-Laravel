<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SpecialityRequest extends FormRequest
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
            'specialityName' => 'required|string|max:35|unique:specialities,specialityName',
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
            'specialityName.required' => 'El campo especialidad es obligatorio.',
            'specialityName.string' => 'El campo especialidad debe ser una cadena de texto.',
            'specialityName.max' => 'El campo especialidad debe tener un máximo de 35 caracteres.',
            'specialityName.unique' => 'El nombre de la especialidad ya existe.',
        ];
    }
}
