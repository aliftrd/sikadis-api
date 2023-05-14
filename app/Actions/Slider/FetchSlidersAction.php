<?php

namespace App\Actions\Slider;

use App\Actions\Action;
use App\Http\Resources\Api\SliderResource;
use App\Models\Slider;

class FetchSlidersAction extends Action
{
    public function execute()
    {
        $sliders = Slider::with(['firstImage'])
            ->latest()
            ->limit(10)
            ->get();

        return SliderResource::collection($sliders);
    }
}
