<?php

namespace App\Http\Controllers\Page;

use App\Actions\Page\UpdatePageAction;
use App\Enums\FlashType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Page\UpdatePageRequest;
use App\Models\Page;

class UpdatePageController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:page.edit');
    }

    public function edit(Page $page)
    {
        $page->load('firstImage');

        return view('pages.page.form', compact('page'));
    }

    public function update(UpdatePageRequest $request, Page $page)
    {
        UpdatePageAction::resolve()->execute($request, $page);

        return $this->resolveForRedirectResponseWith('admin.pages.index', FlashType::SUCCESS, 'Page updated successfully');
    }
}
