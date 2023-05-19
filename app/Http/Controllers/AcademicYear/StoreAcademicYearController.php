<?php

namespace App\Http\Controllers\AcademicYear;

use App\Actions\AcademicYear\StoreAcademicYearAction;
use App\Enums\FlashType;
use App\Http\Controllers\Controller;
use App\Http\Requests\AcademicYear\StoreAcademicYearRequest;

class StoreAcademicYearController extends Controller
{
    public function __construct()
    {
        $this->middleware(['can:academic.year.create']);
    }

    public function create()
    {
        return view('pages.academic-year.form');
    }

    public function store(StoreAcademicYearRequest $request)
    {
        StoreAcademicYearAction::resolve()->execute($request);

        return $this->resolveForRedirectResponseWith('admin.academic-years.index', FlashType::SUCCESS, 'Academic year created successfully');
    }
}
