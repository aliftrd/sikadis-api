<?php

namespace App\Actions\Slider;

use App\Actions\Action;
use App\Http\Requests\Slider\StoreSliderRequest;
use App\Models\Slider;
use Illuminate\Support\Facades\Storage;

class StoreSliderAction extends Action
{
    public function execute(StoreSliderRequest $request): void
    {
        $slider = Slider::create([
            'title' => $request->title,
        ]);

        $slider->addMedia(Storage::path($request->image))->toMediaCollection(Slider::IMAGE_COLLECTION);
    }
}
