<?php

namespace App\Http\Requests\Post\Category;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
        ];
    }

    public function authorize(): bool
    {
        return $this->user()->can('post.category.create');
    }
}
