<?php

namespace App\Actions\UserManagement\User;

use App\Actions\Action;
use App\Exceptions\UserManagement\User\CannotDeleteLastAdminException;
use App\Exceptions\UserManagement\User\CannotDeleteYourselfException;
use App\Models\User;

class DestroyUserAction extends Action
{
    public function execute(User $user): void
    {
        throw_if($user->id === auth()->id(), CannotDeleteYourselfException::class, 'Kamu tidak bisa menghapus akunmu sendiri.');
        throw_if(User::role(1)->count() < 2 && $user->hasRole(1), CannotDeleteLastAdminException::class, 'Kamu tidak bisa menghapus akun admin terakhir.');

        $user->delete();
    }
}
