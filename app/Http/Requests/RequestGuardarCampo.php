<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestGuardarCampo extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre' => 'required',
            'descripcion' => 'required',
            'es_compuesto' => 'required',
            'abreviatura' => 'required'
        ];
    }
}
