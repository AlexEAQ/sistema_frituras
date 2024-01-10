<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CrearProductoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'atributo_id' => 'required',
            'registro_sanitario' => 'required',
            'año' => 'required',
            'precio_lista' => 'required',
            'precio_real' => 'required',
            'precio_venta' => 'required',
            'origen' => 'required',
            'presentacion' => 'required',

            // Agrega más reglas de validación para otros campos si es necesario
        ];
    }
    public function messages()
{
    return [
        'atributo_id.required' => 'El campo Atributo es obligatorio.',
        'registro_sanitario.required' => 'El campo Registro Sanitario es obligatorio.',
        'año.required' => 'El campo Año es obligatorio.',
        'precio_lista.required' => 'El campo Precio Lista es obligatorio.',
        'precio_real.required' => 'El campo Precio Real es obligatorio.',
        'precio_venta.required' => 'El campo Precio Venta es obligatorio.',
        'origen.required' => 'El campo Origen es obligatorio.',
        'presentacion.required' => 'El campo Presentación es obligatorio.',
        // Agrega más mensajes de validación para otros campos si es necesario
    ];
}

}
