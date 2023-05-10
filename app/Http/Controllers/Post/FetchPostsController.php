<?php

namespace App\Http\Controllers\Post;

use App\DataTables\PostsDataTable;
use App\Http\Controllers\Controller;

class FetchPostsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['can:post.view']);
    }

    public function __invoke(PostsDataTable $dataTable)
    {
        return $dataTable->render('pages.post.index');
    }
}
