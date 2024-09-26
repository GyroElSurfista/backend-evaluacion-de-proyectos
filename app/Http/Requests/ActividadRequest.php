<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ActividadRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre' => 'required|max:20',
            'descripcion' => 'nullable|max:256',
            'fechaInici' => 'required|date',
            'fechaFin' => 'required|date|after:fechaInici',
            'identificadorUsua' => 'required',
            'identificadorObjet' => 'required'
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($this->fechaInici >= $this->fechaFin) {
                $validator->errors()->add('fechaInicio', 'La fecha de inicio debe ser menor que la fecha de fin.');
            }
        });
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Errores de validación',
            'errors' => $errors
        ], 422));
    }
}