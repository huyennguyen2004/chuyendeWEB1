<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBannerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'name' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'link' => 'required',
            'status' => 'required',
            'position' => 'required',
            'sort_order' => 'required'
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'không bỏ trống',
            'link.required' => 'Vui lòng nhập link',
            'position.required' => 'Vui lòng chọn vị trí',
        ];
    }
}