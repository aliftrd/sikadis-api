<?php

namespace App\Http\Controllers\Slider;

use App\Actions\Slider\StoreSliderAction;
use App\Enums\FlashType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Slider\StoreSliderRequest;

class StoreSliderController extends Controller
{
    public function __construct()
    {
        $this->middleware(['can:slider.create']);
    }

    public function create()
    {
        return view('pages.slider.form');
    }

    public function store(StoreSliderRequest $request)
    {
        StoreSliderAction::resolve()->execute($request);

        return $this->resolveForRedirectResponseWith('admin.sliders.index', FlashType::SUCCESS, 'Slider berhasil ditambahkan.');
    }
}
