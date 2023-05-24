<?php

namespace App\Http\Controllers\Post\Category;

use App\Actions\Post\Category\UpdateCategoryAction;
use App\Enums\FlashType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\Category\UpdateCategoryRequest;
use App\Models\Category;

class UpdateCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['can:post.category.edit']);
    }

    public function edit(Category $category)
    {
        return view('pages.post.category.form', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        UpdateCategoryAction::resolve()->execute($request, $category);

        return $this->resolveForRedirectResponseWith('admin.posts.categories.index', FlashType::SUCCESS, 'Kategori berhasil diperbarui.');
    }
}
