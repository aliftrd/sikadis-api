<?php

namespace App\Http\Controllers\Api\Post;

use App\Actions\Post\FetchPostsAction;
use App\Http\Controllers\Controller;

class FetchPostsController extends Controller
{
    public function __invoke()
    {
        $posts = (FetchPostsAction::resolve()->execute())->response()->getData();

        return $this->resolveForSuccessResponseWith('Berhasil mengambil data.', compact('posts'), 200);
    }
}
