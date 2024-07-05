<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'category_id' => 'required|integer|exists:ntbh_category,id',
            'brand_id' => 'required|integer|exists:ntbh_brand,id',
            'price' => 'required|numeric|min:0',
            'pricesale' => 'nullable|numeric|min:0',
            'qty' => 'required|integer|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'detail' => 'required|string|max:255',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'không để trống',
            'price.required' => 'không để trống',
            'qty.required' => 'không để trống',
            'image.required' => 'không để trống',
            'detail.required' => 'không để trống',
        ];
    }
}
