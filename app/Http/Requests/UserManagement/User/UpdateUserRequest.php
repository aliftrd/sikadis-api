<?php

namespace App\Http\Requests\UserManagement\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UpdateUserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $this->user->id],
            'role' => ['required', 'exists:roles,name'],
            'password' => ['nullable', Password::min(8)->mixedCase()->numbers()->symbols()],
        ];
    }

    public function authorize(): bool
    {
        return $this->user()->can('user.edit');
    }
}
