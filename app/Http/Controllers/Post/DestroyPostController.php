<?php

namespace App\Http\Controllers\Post;

use App\Actions\Post\DestroyPostAction;
use App\Enums\FlashType;
use App\Http\Controllers\Controller;
use App\Models\Post;

class DestroyPostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['can:post.destroy']);
    }

    public function __invoke(Post $post)
    {
        DestroyPostAction::resolve()->execute($post);

        return $this->resolveForRedirectResponseWith('admin.posts.index', FlashType::SUCCESS, 'Post berhasil dihapus.');
    }
}
