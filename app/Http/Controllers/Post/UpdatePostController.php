<?php

namespace App\Http\Controllers\Post;

use App\Actions\Post\Category\FetchCategoriesAction;
use App\Actions\Post\UpdatePostAction;
use App\Enums\FlashType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\UpdatePostRequest;
use App\Models\Post;

class UpdatePostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['can:post.edit']);
    }

    public function edit(Post $post)
    {
        $categories = FetchCategoriesAction::resolve()->execute();

        return view('pages.post.form', compact('categories', 'post'));
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        UpdatePostAction::resolve()->execute($request, $post);

        return $this->resolveForRedirectResponseWith('admin.posts.index', FlashType::SUCCESS, 'Post updated successfully.');
    }
}
