<?php

namespace App\Http\Controllers\Api\StudentCandidate;

use App\Actions\AcademicYear\FetchActiveAcademicYearAction;
use App\Http\Controllers\Controller;

class FetchPpdbController extends Controller
{
    public function __invoke()
    {
        $academicYear = FetchActiveAcademicYearAction::resolve()->execute();

        return $this->resolveForSuccessResponseWith('Berhasil mengambil data.', [
            'academic_year' => $academicYear->year,
            'ppdb' => $academicYear->ppdb,
            'status' => $academicYear->status,
        ]);
    }
}
