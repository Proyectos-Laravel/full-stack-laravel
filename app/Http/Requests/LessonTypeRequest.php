<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

final class LessonTypeRequest extends FormRequest
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
                Rule::unique('lesson_types')->ignore($this->route('id'), 'lesson_type_id'),
            ],
            'is_active' => ['sometimes', 'boolean'],
            'created_at' => ['required', 'date'],
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => __('Nombre'),
            'is_active' => __('Activo'),
            'created_at' => __('Fecha de creación'),
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => __('El campo :attribute es obligatorio.'),
            'name.max' => __('El campo :attribute no debe exceder los :max caracteres.'),
            'name.unique' => __('El campo :attribute ya está en uso.'),
            'is_active.boolean' => __('El campo :attribute debe ser un booleano.'),
            'created_at.required' => __('El campo :attribute es obligatorio.'),
            'created_at.date' => __('El campo :attribute debe ser una fecha.'),
        ];
    }
}
