<?php

namespace App\Actions\Post\Category;

use App\Actions\Action;
use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class FetchCategoriesAction extends Action
{
    public function execute(): Collection
    {
        $categories = Category::orderBy('title')
            ->get();

        return $categories;
    }
}
