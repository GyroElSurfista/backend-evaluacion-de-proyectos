<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEntregableRequest extends FormRequest
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
            "identificadorObjet" => ['integer', 'required', 'exists:Objetivo,identificador'],
            "nombre" => ['string', 'required', 'max:40'],
            "descripcion" => ['string', 'nullable', 'max:100']
        ];
    }
}
