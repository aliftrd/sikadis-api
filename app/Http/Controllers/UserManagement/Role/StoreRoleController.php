<?php

namespace App\Http\Controllers\UserManagement\Role;

use App\Actions\UserManagement\Role\StoreRoleAction;
use App\Enums\FlashType;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserManagement\Role\StoreRoleRequest;
use Spatie\Permission\Models\Permission;

class StoreRoleController extends Controller
{
    public function __construct()
    {
        $this->middleware(['can:role.create']);
    }

    public function create()
    {
        $permissions = Permission::get();

        return view('pages.user-management.roles.form', compact('permissions'));
    }

    public function store(StoreRoleRequest $request)
    {
        StoreRoleAction::resolve()->execute($request);

        return $this->resolveForRedirectResponseWith('admin.roles.index', FlashType::SUCCESS, 'Role created successfully');
    }
}
