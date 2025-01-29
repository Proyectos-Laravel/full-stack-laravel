<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'max:255',
                Rule::unique('categories')->ignore($this->route('id'), 'category_id')
            ],
            'description' => ['required', 'max:255'],
            'is_active' => ['sometimes', 'boolean'],
            'created_at' => ['sometimes', 'date'],
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => __('Nombre'),
            'description' => __('Descripción'),
            'is_active' => __('Activa'),
            'created_at' => __('Fecha de creación'),
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => __('El campo :attribute es obligatorio.'),
            'name.max' => __('El campo :attribute no debe exceder los :max caracteres.'),
            'name.unique' => __('El campo :attribute ya está en uso.'),
            'description.required' => __('El campo :attribute es obligatorio.'),
            'description.max' => __('El campo :attribute no debe exceder los :max caracteres.'),
            'is_active.boolean' => __('El campo :attribute debe ser un booleano.'),
            'created_at.date' => __('El campo :attribute debe ser una fecha.'),
        ];
    }
}
