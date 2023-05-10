<?php

namespace App\Actions\Page;

use App\Actions\Action;
use App\Models\Page;

class DestroyPageAction extends Action
{
    public function execute(Page $page): void
    {
        $page->delete();
    }
}
