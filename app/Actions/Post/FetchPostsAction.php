<?php

namespace App\Actions\Post;

use App\Actions\Action;
use App\Http\Resources\Api\PostResource;
use App\Models\Post;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class FetchPostsAction extends Action
{
    public function execute(): PostResource|AnonymousResourceCollection
    {
        $posts = Post::with(['firstImage', 'category'])
            ->status(1)
            ->latest()
            ->simplePaginate(10);

        return PostResource::collection($posts);
    }
}
