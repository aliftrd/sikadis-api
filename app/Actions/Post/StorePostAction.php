<?php

namespace App\Actions\Post;

use App\Actions\Action;
use App\Http\Requests\Post\StorePostRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class StorePostAction extends Action
{
    public function execute(StorePostRequest $request): void
    {
        $post = Post::create([
            'category_id' => $request->category,
            'title' => $request->title,
            'content' => $request->content,
            'status' => $request->status,
        ]);

        $post->addMedia(Storage::path($request->thumbnail))->toMediaCollection(Post::IMAGE_COLLECTION);
    }
}
