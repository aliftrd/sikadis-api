<?php

namespace App\Actions\Slider;

use App\Actions\Action;
use App\Http\Requests\Slider\UpdateSliderRequest;
use App\Models\Slider;
use Illuminate\Support\Facades\Storage;

class UpdateSliderAction extends Action
{
    public function execute(UpdateSliderRequest $request, Slider $slider): void
    {
        $slider->update([
            'title' => $request->title,
        ]);

        if (!empty($request->image)) {
            if ($slider->hasMedia(Slider::IMAGE_COLLECTION)) {
                $slider->clearMediaCollection(Slider::IMAGE_COLLECTION);
            }
            $slider->addMedia(Storage::path($request->image))->toMediaCollection(Slider::IMAGE_COLLECTION);
        }
    }
}
