<?php

namespace App\Actions\UserManagement\Role;

use App\Actions\Action;
use App\Exceptions\UserManagement\Role\CannotUpdateAdminRoleException;
use App\Http\Requests\UserManagement\Role\UpdateRoleRequest;
use Spatie\Permission\Models\Role;

class UpdateRoleAction extends Action
{
    public function execute(UpdateRoleRequest $request, Role $role): void
    {
        $role->update([
            'name' => $request->name,
        ]);
        if (!is_null($request->permissions)) $role->syncPermissions($request->permissions);
    }
}
