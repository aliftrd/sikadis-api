<?php

namespace App\Http\Controllers\Page;

use App\DataTables\PagesDataTable;
use App\Http\Controllers\Controller;

class FetchPagesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['can:page.view']);
    }

    public function __invoke(PagesDataTable $dataTable)
    {
        return $dataTable->render('pages.page.index');
    }
}
