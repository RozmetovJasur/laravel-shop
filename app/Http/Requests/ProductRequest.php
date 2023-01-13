<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name.*' => 'required|string',
            'description.*' => 'required|string',
            'price' => 'required|integer',
            'category_id' => 'exists:App\Models\Category,id',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }
}
