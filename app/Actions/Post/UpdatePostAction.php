<?php

namespace App\Actions\Post;

use App\Actions\Action;
use App\Http\Requests\Post\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class UpdatePostAction extends Action
{
    public function execute(UpdatePostRequest $request, Post $post): void
    {
        $post->update([
            'title' => $request->title,
            'content' => $request->content,
            'status' => $request->status,
        ]);

        if (!empty($request->thumbnail)) {
            if ($post->hasMedia(Post::IMAGE_COLLECTION)) {
                $post->clearMediaCollection(Post::IMAGE_COLLECTION);
            }
            $post->addMedia(Storage::path($request->thumbnail))->toMediaCollection(Post::IMAGE_COLLECTION);
        }
    }
}
