<?php

namespace App\Http\Controllers\UserManagement\Role;

use App\Actions\UserManagement\Role\UpdateRoleAction;
use App\Enums\FlashType;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserManagement\Role\UpdateRoleRequest;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UpdateRoleController extends Controller
{
    public function __construct()
    {
        $this->middleware(['can:role.edit']);
    }

    public function edit(Role $role)
    {
        $role->load('permissions');
        $permissions = Permission::get();

        return view('pages.user-management.roles.form', compact('role', 'permissions'));
    }

    public function update(UpdateRoleRequest $request, Role $role)
    {
        UpdateRoleAction::resolve()->execute($request, $role);

        return $this->resolveForRedirectResponseWith('admin.roles.index', FlashType::SUCCESS, 'Role updated successfully');
    }
}
