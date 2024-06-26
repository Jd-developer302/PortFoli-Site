<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TeamFormRequest extends FormRequest
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
            'name' => 'required',
            'designation' => 'required',
            'image_name' => 'required',
            'gmail' => 'required', // Make sure 'gmail' is defined here
            'linkedin' => 'required',
            'facebook' => 'required',
        ];
        return $rules;
    }
}
