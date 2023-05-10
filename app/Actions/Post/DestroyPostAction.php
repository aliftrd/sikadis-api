<?php

namespace App\Actions\Post;

use App\Actions\Action;
use App\Models\Post;

class DestroyPostAction extends Action
{
    public function execute(Post $post): void
    {
        $post->delete();
    }
}
