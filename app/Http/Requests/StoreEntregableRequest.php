<?php

namespace App\Http\Requests;

use App\Models\Objetivo;
use App\Services\ObjetivoService;
use App\Services\PlanificacionService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            "nombre" => [
                'string',
                'required',
                'max:40',
                Rule::unique('Entregable')->where(function ($query) {
                    return $query->where('identificadorObjet', $this->identificadorObjet);
                })
            ],
            "descripcion" => ['string', 'nullable', 'max:256'],
            "criteriosAcept" => ['array', 'required'],
            "criteriosAcept.*.descripcion" => ['string', 'required', 'distinct']
        ];
    }
}
