<?php

namespace App\Http\Controllers\UserManagement\Role;

use App\Actions\UserManagement\Role\DestroyRoleAction;
use App\Enums\FlashType;
use App\Exceptions\UserManagement\Role\CannotDeleteAdminRoleException;
use App\Exceptions\UserManagement\Role\RoleUsedForDefaultRoleException;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;

class DestroyRoleController extends Controller
{
    public function __construct()
    {
        $this->middleware(['can:role.destroy']);
    }

    public function __invoke(Role $role)
    {
        try {
            DestroyRoleAction::resolve()->execute($role);

            return $this->resolveForRedirectResponseWith('admin.roles.index', FlashType::SUCCESS, 'Role berhasil dihapus.');
        } catch (\Exception $e) {
            $message = match (true) {
                $e instanceof CannotDeleteAdminRoleException, $e instanceof RoleUsedForDefaultRoleException => $e->getMessage(),
                default => 'Terjadi kesalahan saat menghapus role.',
            };

            return $this->resolveForRedirectResponseWith('admin.roles.index', FlashType::ERROR, $message);
        }
    }
}
