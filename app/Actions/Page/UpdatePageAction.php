<?php

namespace App\Actions\Page;

use App\Actions\Action;
use App\Http\Requests\Page\UpdatePageRequest;
use App\Models\Page;
use Illuminate\Support\Facades\Storage;

class UpdatePageAction extends Action
{
    public function execute(UpdatePageRequest $request, Page $page): void
    {
        $page->update([
            'title' => $request->title,
            'content' => $request->content,
            'status' => $request->status,
            'priority' => $request->priority,
        ]);

        if (!empty($request->thumbnail)) {
            if ($page->hasMedia(Page::IMAGE_COLLECTION)) {
                $page->clearMediaCollection(Page::IMAGE_COLLECTION);
            }
            $page->addMedia(Storage::path($request->thumbnail))->toMediaCollection(Page::IMAGE_COLLECTION);
        }
    }
}
