<?php

namespace App\Actions\AcademicYear;

use App\Actions\Action;
use App\Models\AcademicYear;

class UpdateAcademicYearStatusAction extends Action
{
    public function execute(AcademicYear $academicYear): void
    {
        AcademicYear::active()->update([
            'status' => false,
            'ppdb' => false,
        ]);

        $academicYear->update(['status' => true]);
    }
}
