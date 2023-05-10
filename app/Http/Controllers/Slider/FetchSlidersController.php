<?php

namespace App\Http\Controllers\Slider;

use App\DataTables\SlidersDataTable;
use App\Http\Controllers\Controller;

class FetchSlidersController extends Controller
{
    public function __construct()
    {
        $this->middleware(['can:slider.view']);
    }

    public function __invoke(SlidersDataTable $dataTable)
    {
        return $dataTable->render('pages.slider.index');
    }
}
