<?php

namespace App\Actions\Post\Category;

use App\Actions\Action;
use App\Models\Category;

class DestroyCategoryAction extends Action
{
    public function execute(Category $category): void
    {
        $category->delete();
    }
}
