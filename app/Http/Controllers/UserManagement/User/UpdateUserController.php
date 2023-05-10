<?php

namespace App\Http\Controllers\UserManagement\User;

use App\Actions\UserManagement\Role\FetchRolesAction;
use App\Actions\UserManagement\User\UpdateUserAction;
use App\Enums\FlashType;
use App\Exceptions\UserManagement\User\CannotDeleteLastAdminException;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserManagement\User\UpdateUserRequest;
use App\Models\User;

class UpdateUserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['can:user.edit']);
    }

    public function edit(User $user)
    {
        $user->load('roles');
        $roles = FetchRolesAction::resolve()->execute();

        return view('pages.user-management.users.form', compact('user', 'roles'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        try {
            UpdateUserAction::resolve()->execute($request, $user);

            return $this->resolveForRedirectResponseWith('admin.users.index', FlashType::SUCCESS, 'User updated successfully.');
        } catch (\Exception $e) {
            $message = match (true) {
                $e instanceof CannotDeleteLastAdminException => $e->getMessage(),
                default => 'Something went wrong.',
            };

            return $this->resolveForRedirectResponseWith('admin.users.index', FlashType::ERROR, $message);
        }
    }
}
