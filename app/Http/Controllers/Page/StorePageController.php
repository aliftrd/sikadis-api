<?php

namespace App\Http\Controllers\Page;

use App\Actions\Page\StorePageAction;
use App\Enums\FlashType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Page\StorePageRequest;
use Illuminate\Http\Request;

class StorePageController extends Controller
{
    public function __construct()
    {
        $this->middleware(['can:page.create']);
    }

    public function create()
    {
        return view('pages.page.form');
    }

    public function store(StorePageRequest $request)
    {
        StorePageAction::resolve()->execute($request);

        return $this->resolveForRedirectResponseWith('admin.pages.index', FlashType::SUCCESS, 'Halaman berhasil ditambahkan.');
    }
}
