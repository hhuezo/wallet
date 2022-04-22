<?php

namespace App\Http\Requests\catalogo;

use Illuminate\Foundation\Http\FormRequest;

class OrdenCompraFormRequest extends FormRequest
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
            'Codigo' => 'required|unique:almacen_orden_compra',
            'Fecha' => 'required',
            'Uso' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'Codigo.unique' => 'La orden de compra ya existe',
            'Codigo.required' => 'Ingresar una orden de compra',
        ];
    }
}
