<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class UpdateProductRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'max:255',
            'image' => 'max:255',
            'brand' => 'max:255',
            'price' => 'numeric|min:1',
            'price_sale' => 'numeric|min:1',
            'category' => 'max:255',
            'stock' => 'numeric|min:1',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $response = new Response(['errors' => $validator->errors()], 422);
        throw new ValidationException($validator, $response);
    }
}
