<?php

namespace App\Actions\AcademicYear;

use App\Actions\Action;
use App\Exceptions\AcademicYear\CannotUpdateCauseAcademicYearNonactiveException;
use App\Models\AcademicYear;

class UpdateAcademicYearPpdbAction extends Action
{
    public function execute(AcademicYear $academicYear): void
    {
        throw_unless($academicYear->status, CannotUpdateCauseAcademicYearNonactiveException::class, 'Academic year is not active');

        $academicYear->update(['ppdb' => !$academicYear->ppdb]);
    }
}
