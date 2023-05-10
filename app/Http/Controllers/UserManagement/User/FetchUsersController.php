<?php

namespace App\Http\Controllers\UserManagement\User;

use App\DataTables\UsersDataTable;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class FetchUsersController extends Controller
{
    public function __construct()
    {
        $this->middleware(['can:user.view']);
    }

    public function __invoke(UsersDataTable $dataTable)
    {
        return $dataTable->render('pages.user-management.users.index');
    }
}
