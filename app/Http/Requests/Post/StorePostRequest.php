<?php

namespace App\Http\Requests\Post;

use App\Actions\Upload\ResolveRevertAction;
use App\Rules\ValidFileUploadRule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'category' => ['required', 'integer', 'exists:categories,id'],
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'thumbnail' => ['nullable', 'string', new ValidFileUploadRule(['image/jpeg', 'image/png'])],
            'status' => ['required', 'string', 'in:draft,publish'],
        ];
    }

    public function passedValidation(): void
    {
        $this->merge([
            'status' => $this->status == 'draft' ? 0 : 1,
        ]);
    }

    public function failedValidation(Validator $validator): void
    {
        ResolveRevertAction::resolve()->execute($this->thumbnail);
        parent::failedValidation($validator); // TODO: Change the autogenerated stub
    }

    public function authorize(): bool
    {
        return $this->user()->can('post.create');
    }
}
