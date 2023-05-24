<?php

namespace App\Http\Controllers\Page;

use App\Actions\Page\DestroyPageAction;
use App\Enums\FlashType;
use App\Http\Controllers\Controller;
use App\Models\Page;

class DestroyPageController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:page.destroy');
    }

    public function __invoke(Page $page)
    {
        DestroyPageAction::resolve()->execute($page);

        return $this->resolveForRedirectResponseWith('admin.pages.index', FlashType::SUCCESS, 'Halaman berhasil dihapus.');
    }
}
