<?php

namespace App\Http\Controllers\AcademicYear;

use App\DataTables\AcademicYearDataTable;
use App\Http\Controllers\Controller;

class FetchAcademicYearController extends Controller
{
    public function __construct()
    {
        $this->middleware(['can:academic.year.view']);
    }

    public function __invoke(AcademicYearDataTable $dataTable)
    {
        return $dataTable->render('pages.academic-year.index');
    }
}
