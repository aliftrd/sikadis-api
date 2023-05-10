<?php

namespace App\Actions\UserManagement\Role;

use App\Actions\Action;
use App\Http\Requests\UserManagement\Role\StoreRoleRequest;
use Spatie\Permission\Models\Role;

class StoreRoleAction extends Action
{
    public function execute(StoreRoleRequest $request): void
    {
        $role = Role::create([
            'name' => $request->name,
        ]);
        $role->syncPermissions($request->permissions);
    }
}
