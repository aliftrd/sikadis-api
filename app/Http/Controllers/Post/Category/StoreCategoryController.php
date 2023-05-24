<?php

namespace App\Http\Controllers\Post\Category;

use App\Actions\Post\Category\StoreCategoryAction;
use App\Enums\FlashType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\Category\StoreCategoryRequest;

class StoreCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['can:post.category.create']);
    }

    public function create()
    {
        return view('pages.post.category.form');
    }

    public function store(StoreCategoryRequest $request)
    {
        StoreCategoryAction::resolve()->execute($request);

        return $this->resolveForRedirectResponseWith('admin.posts.categories.index', FlashType::SUCCESS, 'Kategori berhasil ditambahkan.');
    }
}
