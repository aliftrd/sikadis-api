<?php

namespace App\Actions\UserManagement\User;

use App\Actions\Action;
use App\Http\Requests\UserManagement\User\StoreUserRequest;
use App\Models\User;

class StoreUserAction extends Action
{
    public function execute(StoreUserRequest $request): void
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        $user->syncRoles($request->role);
    }
}
