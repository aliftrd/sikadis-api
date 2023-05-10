<?php

namespace App\Actions\Post\Category;

use App\Actions\Action;
use App\Http\Requests\Post\Category\UpdateCategoryRequest;
use App\Models\Category;

class UpdateCategoryAction extends Action
{
    public function execute(UpdateCategoryRequest $request, Category $category): void
    {
        $category->update([
            'title' => $request->title,
        ]);
    }
}
