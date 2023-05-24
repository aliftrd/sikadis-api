<?php

namespace App\Http\Controllers\Slider;

use App\Actions\Slider\UpdateSliderAction;
use App\Enums\FlashType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Slider\UpdateSliderRequest;
use App\Models\Slider;

class UpdateSliderController extends Controller
{
    public function __construct()
    {
        $this->middleware(['can:slider.edit']);
    }

    public function edit(Slider $slider)
    {
        return view('pages.slider.form', compact('slider'));
    }

    public function update(UpdateSliderRequest $request, Slider $slider)
    {
        UpdateSliderAction::resolve()->execute($request, $slider);

        return $this->resolveForRedirectResponseWith('admin.sliders.index', FlashType::SUCCESS, 'Slider berhasil diperbarui.');
    }
}
