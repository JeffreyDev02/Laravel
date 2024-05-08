<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticuloFormRequest extends FormRequest
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
            'idcategoria' => 'required',
            'codigo' => 'required|max:4|min:4',
            'nombre' => 'required|max:100',
            'stock' => 'required|numeric',
            'descripcion' => 'required|max:100',
            'imagen'=> 'required'
        ];
    }
}
