<?php

namespace App\Http\Controllers\Api;

use App\Enums\ReligionType;
use App\Http\Controllers\Controller;

class FetchReligionController extends Controller
{
    public function __invoke()
    {
        $religions = ReligionType::cases();

        return $this->resolveForSuccessResponseWith('Fetch religions success', $religions);
    }
}
