<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CalculatorRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_number' => 'required|numeric',
            'second_number' => 'required|numeric',
            'operation' => 'required|in:plus,minus,multiply,divide',
        ];
    }

    /**
     * Get custom error messages for validation.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'first_number.required' => 'First Number is required.',
            'first_number.numeric' => 'First Number must be a number.',
            'second_number.required' => 'Second Number is required.',
            'second_number.numeric' => 'Second Number must be a number.',
            'operation.required' => 'Operation is required.',
            'operation.in' => 'Invalid operation selected.',
        ];
    }
}
