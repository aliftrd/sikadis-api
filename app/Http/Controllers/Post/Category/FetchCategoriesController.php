<?php

namespace App\Http\Controllers\Post\Category;

use App\DataTables\CategoriesDataTable;
use App\Http\Controllers\Controller;

class FetchCategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['can:post.category.view']);
    }

    public function __invoke(CategoriesDataTable $dataTable)
    {
        return $dataTable->render('pages.post.category.index');
    }
}
