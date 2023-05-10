<?php

namespace App\Actions\Page;

use App\Actions\Action;
use App\Http\Requests\Page\StorePageRequest;
use App\Models\Page;
use Illuminate\Support\Facades\Storage;

class StorePageAction extends Action
{
    public function execute(StorePageRequest $request): void
    {
        $page = Page::create([
            'title' => $request->title,
            'content' => $request->content,
            'status' => $request->status,
        ]);

        $page->addMedia(Storage::path($request->thumbnail))->toMediaCollection(Page::IMAGE_COLLECTION);
    }
}
