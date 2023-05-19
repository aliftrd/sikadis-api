<?php

namespace App\Actions\AcademicYear;

use App\Actions\Action;
use App\Models\AcademicYear;

class FetchActiveAcademicYearAction extends Action
{
    public function execute()
    {
        $academicYear = AcademicYear::active()
            ->first();

        return $academicYear;
    }
}
