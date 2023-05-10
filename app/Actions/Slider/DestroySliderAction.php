<?php

namespace App\Actions\Slider;

use App\Actions\Action;
use App\Models\Slider;

class DestroySliderAction extends Action
{
    public function execute(Slider $slider): void
    {
        $slider->delete();
    }
}
