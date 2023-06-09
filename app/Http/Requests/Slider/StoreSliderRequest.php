<?php

namespace App\Http\Requests\Slider;

use App\Actions\Upload\ResolveRevertAction;
use App\Rules\ValidFileUploadRule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class StoreSliderRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'image' => ['required', 'string', new ValidFileUploadRule(['image/jpeg', 'image/png'])],
        ];
    }

    public function failedValidation(Validator $validator): void
    {
        ResolveRevertAction::resolve()->execute($this->image);
        parent::failedValidation($validator); // TODO: Change the autogenerated stub
    }

    public function authorize(): bool
    {
        return $this->user()->can('slider.create');
    }
}
