<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ServicesCategoryFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rules = [
            'name' =>[
                'required',
                'string'
            ],
            'slug' =>[
                'required',
                'string'
            ],
            'image' =>[
                'required',
                'mimes:jpg,jpeg,png'
            ],
        ];
        return $rules;
    }
}
