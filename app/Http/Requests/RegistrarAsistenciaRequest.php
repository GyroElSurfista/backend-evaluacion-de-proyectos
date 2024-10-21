<?php

namespace App\Http\Requests;


use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class RegistrarAsistenciaRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'identificadorUsuar' => ['required', 'numeric', 'exists:users,id'],
            'fecha' => [
                'required',
                'date_format:Y-m-d',
                Rule::unique('Asistencia')->where(function ($query) {
                    return $query->where('identificadorUsuar', $this->identificadorUsuar)
                        ->where('fecha', $this->fecha);
                })
            ],
            'valor' => ['required', 'boolean']
        ];
    }
}
