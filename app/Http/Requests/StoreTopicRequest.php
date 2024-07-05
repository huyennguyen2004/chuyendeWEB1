<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTopicRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'sort_order' => 'nullable|integer',
            'status' => 'required|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'không bỏ trống',
        ];
    }
}
