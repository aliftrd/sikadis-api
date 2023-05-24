<?php

namespace App\Http\Controllers\Api\Slider;

use App\Actions\Slider\FetchSlidersAction;
use App\Http\Controllers\Controller;

class FetchSlidersController extends Controller
{
    public function __invoke()
    {
        $sliders = (FetchSlidersAction::resolve()->execute())->response()->getData();

        return $this->resolveForSuccessResponseWith('Berhasil mengambil data.', compact('sliders'), 200);
    }
}
