<?php

namespace App\Actions\AcademicYear;

use App\Actions\Action;
use App\Http\Requests\AcademicYear\StoreAcademicYearRequest;
use App\Http\Requests\AcademicYear\UpdateAcademicYearRequest;
use App\Models\AcademicYear;

class UpdateAcademicYearAction extends Action
{
    public function execute(UpdateAcademicYearRequest $request, AcademicYear $academicYear): void
    {
        $academicYear->update([
            'year' => $request->year,
        ]);
    }
}
