<?php

namespace App\Http\Controllers\UserManagement\User;

use App\Actions\UserManagement\Role\FetchRolesAction;
use App\Actions\UserManagement\User\StoreUserAction;
use App\Enums\FlashType;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserManagement\User\StoreUserRequest;

class StoreUserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['can:user.create']);
    }

    public function create()
    {
        $roles = FetchRolesAction::resolve()->execute();

        return view('pages.user-management.users.form', compact('roles'));
    }

    public function store(StoreUserRequest $request)
    {
        StoreUserAction::resolve()->execute($request);

        return $this->resolveForRedirectResponseWith('admin.users.index', FlashType::SUCCESS, 'User berhasil ditambahkan.');
    }
}
