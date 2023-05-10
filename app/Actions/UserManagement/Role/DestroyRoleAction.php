<?php

namespace App\Actions\UserManagement\Role;

use App\Actions\Action;
use App\Enums\SettingPrefix;
use App\Exceptions\UserManagement\Role\CannotDeleteAdminRoleException;
use App\Exceptions\UserManagement\Role\RoleUsedForDefaultRoleException;
use App\Models\Setting;
use App\Models\User;
use Spatie\Permission\Models\Role;

class DestroyRoleAction extends Action
{
    public function execute(Role $role): void
    {
        $defaultRoleSetting = Setting::prefix(SettingPrefix::SYSTEM)->variable('DEFAULT_ROLE')->first()->value;
        throw_if($role->id == 1, CannotDeleteAdminRoleException::class, 'You cannot delete this role.');
        throw_if($role->id == $defaultRoleSetting, RoleUsedForDefaultRoleException::class, 'This role cannot be deleted, please change the default role first.');

        $defaultRole = Role::find($defaultRoleSetting);
        User::role($role->id)->each(fn($user) => $user->syncRoles($defaultRole->name));

        $role->delete();
    }
}
