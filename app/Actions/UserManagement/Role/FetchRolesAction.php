<?php

namespace App\Actions\UserManagement\Role;

use App\Actions\Action;
use Illuminate\Database\Eloquent\Collection;
use Spatie\Permission\Models\Role;

class FetchRolesAction extends Action
{
    public function execute(): Collection
    {
        $roles = Role::query()->orderBy('name')->get();

        return $roles;
    }
}
