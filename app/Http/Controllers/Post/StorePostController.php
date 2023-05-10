<?php

namespace App\Http\Controllers\Post;

use App\Actions\Post\Category\FetchCategoriesAction;
use App\Actions\Post\StorePostAction;
use App\Enums\FlashType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StorePostRequest;

class StorePostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['can:post.create']);
    }

    public function create()
    {
        $categories = FetchCategoriesAction::resolve()->execute();

        return view('pages.post.form', compact('categories'));
    }

    public function store(StorePostRequest $request)
    {
        StorePostAction::resolve()->execute($request);

        return $this->resolveForRedirectResponseWith('admin.posts.index', FlashType::SUCCESS, 'Post created successfully.');
    }
}
