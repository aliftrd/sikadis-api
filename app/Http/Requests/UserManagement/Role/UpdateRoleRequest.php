<?php

namespace App\Http\Requests\UserManagement\Role;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRoleRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255', 'unique:roles,name,' . $this->role->id],
            'permissions' => ['nullable', 'array'],
            'permissions.*' => ['nullable', 'string', 'exists:permissions,name'],
        ];
    }

    public function authorize(): bool
    {
        return $this->user()->can('role.edit');
    }
}
