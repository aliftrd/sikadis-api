<?php

namespace App\Actions\UserManagement\User;

use App\Actions\Action;
use App\Exceptions\UserManagement\User\CannotDeleteLastAdminException;
use App\Http\Requests\UserManagement\User\UpdateUserRequest;
use App\Models\User;

class UpdateUserAction extends Action
{
    public function execute(UpdateUserRequest $request, User $user): void
    {
        throw_if(User::role(1)->count() < 2 && $user->hasRole(1), CannotDeleteLastAdminException::class, 'You cannot delete the last admin.');

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
        ]);
        $user->syncRoles($request->role);
    }
}
