<?php

namespace App\Http\Controllers\Post\Category;

use App\Actions\Post\Category\DestroyCategoryAction;
use App\Enums\FlashType;
use App\Http\Controllers\Controller;
use App\Models\Category;

class DestroyCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['can:post.category.destroy']);
    }

    public function __invoke(Category $category)
    {
        DestroyCategoryAction::resolve()->execute($category);

        return $this->resolveForRedirectResponseWith('admin.posts.categories.index', FlashType::SUCCESS, 'Kategori berhasil dihapus.');
    }
}
