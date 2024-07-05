<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'detail' => 'required|max:255',
            'description' => 'nullable',
            'type' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'topic_id' => 'required|integer|exists:ntbh_topic,id',
        ];
    }
}
