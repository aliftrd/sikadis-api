<?php

namespace App\Http\Controllers\UserManagement\User;

use App\Actions\UserManagement\User\DestroyUserAction;
use App\Enums\FlashType;
use App\Exceptions\UserManagement\User\CannotDeleteLastAdminException;
use App\Exceptions\UserManagement\User\CannotDeleteYourselfException;
use App\Http\Controllers\Controller;
use App\Models\User;

class DestroyUserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['can:user.destroy']);
    }

    public function __invoke(User $user)
    {
        try {
            DestroyUserAction::resolve()->execute($user);

            return $this->resolveForRedirectResponseWith('admin.users.index', FlashType::SUCCESS, 'User deleted successfully.');
        } catch (\Exception $e) {
            $message = match (true) {
                $e instanceof CannotDeleteLastAdminException, $e instanceof CannotDeleteYourselfException => $e->getMessage(),
                default => 'Something went wrong.',
            };

            return $this->resolveForRedirectResponseWith('admin.users.index', FlashType::ERROR, $message);
        }
    }
}
