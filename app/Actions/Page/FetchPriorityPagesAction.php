<?php

namespace App\Actions\Page;

use App\Actions\Action;
use App\Models\Page;

class FetchPriorityPagesAction extends Action
{
    public function execute()
    {
        $pages = Page::with(['firstImage'])
            ->priority()
            ->status(1)
            ->latest()
            ->get();

        return $pages;
    }
}
