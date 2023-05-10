<?php

namespace App\Actions\Post\Category;

use App\Actions\Action;
use App\Http\Requests\Post\Category\StoreCategoryRequest;
use App\Models\Category;

class StoreCategoryAction extends Action
{
    public function execute(StoreCategoryRequest $request): void
    {
        Category::create([
            'title' => $request->title,
        ]);
    }
}
