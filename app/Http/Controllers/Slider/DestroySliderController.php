<?php

namespace App\Http\Controllers\Slider;

use App\Actions\Slider\DestroySliderAction;
use App\Enums\FlashType;
use App\Http\Controllers\Controller;
use App\Models\Slider;

class DestroySliderController extends Controller
{
    public function __construct()
    {
        $this->middleware(['can:slider.destroy']);
    }

    public function __invoke(Slider $slider)
    {
        DestroySliderAction::resolve()->execute($slider);

        return $this->resolveForRedirectResponseWith('admin.sliders.index', FlashType::SUCCESS, 'Slider berhasil dihapus.');
    }
}
