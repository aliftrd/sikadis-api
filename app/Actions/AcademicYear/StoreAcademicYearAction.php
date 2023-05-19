<?php

namespace App\Actions\AcademicYear;

use App\Actions\Action;
use App\Http\Requests\AcademicYear\StoreAcademicYearRequest;
use App\Models\AcademicYear;

class StoreAcademicYearAction extends Action
{
    public function execute(StoreAcademicYearRequest $request): void
    {
        AcademicYear::create([
            'year' => $request->year,
        ]);
    }
}
