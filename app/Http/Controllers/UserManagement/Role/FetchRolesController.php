<?php

namespace App\Http\Controllers\UserManagement\Role;

use App\DataTables\RolesDataTable;
use App\Http\Controllers\Controller;

class FetchRolesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['can:role.view']);
    }

    public function __invoke(RolesDataTable $dataTable)
    {
        return $dataTable->render('pages.user-management.roles.index');
    }
}
