<?php

namespace App\Actions\AcademicYear;

use App\Actions\Action;
use App\Models\AcademicYear;

class DestroyAcademicYearAction extends Action
{
    public function execute(AcademicYear $academicYear): void
    {
        $academicYear->delete();
    }
}
