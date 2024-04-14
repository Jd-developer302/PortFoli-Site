<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PortfolioImageFormRequest extends FormRequest
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
            'port_id' =>[
                'required',
                'integer',
            ],
            'name' =>[
                'required',
                'string',
            ],
            'slug' =>[
                'required',
                'string',
            ],
            'description' =>[
                'required'
            ],
            'image' =>[
                'required',
                'mimes:jpg,jpeg,png'
            ],
            'meta_title' =>[
                'required',
                'string',
                'max:200'
            ],
            'meta_description' =>[
                'nullable',
                'string'
            ],
            'meta_keywords' =>[
                'nullable',
                'string'
            ],
        ];

        return $rules;
    }
}
