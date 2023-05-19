<?php

namespace App\Http\Controllers\AcademicYear;

use App\Actions\AcademicYear\DestroyAcademicYearAction;
use App\Enums\FlashType;
use App\Http\Controllers\Controller;
use App\Models\AcademicYear;

class DestroyAcademicYearController extends Controller
{
    public function __construct()
    {
        $this->middleware(['can:academic.year.destroy']);
    }

    public function __invoke(AcademicYear $academicYear)
    {
        DestroyAcademicYearAction::resolve()->execute($academicYear);

        return $this->resolveForRedirectResponseWith('admin.academic-years.index', FlashType::SUCCESS, 'Academic year deleted successfully');
    }
}
