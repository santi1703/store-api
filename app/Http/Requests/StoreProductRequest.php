<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class StoreProductRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'image' => 'required|max:255',
            'brand' => 'required|max:255',
            'price' => 'required|numeric|min:1',
            'price_sale' => 'required|numeric|min:1',
            'category' => 'required|max:255',
            'stock' => 'required|numeric|min:1',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $response = new Response(['errors' => $validator->errors()], 422);
        throw new ValidationException($validator, $response);
    }
}
