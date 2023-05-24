<?php

namespace App\Http\Controllers\Api\StudentCandidate;

use App\Actions\AcademicYear\FetchActiveAcademicYearAction;
use App\Actions\StudentCandidate\StoreStudentCandidateAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\StudentCandidate\StoreStudentCandidateRequest;

class StoreStudentCandidateController extends Controller
{
    public function __invoke(StoreStudentCandidateRequest $request)
    {
        $academicYear = FetchActiveAcademicYearAction::resolve()->execute();
        if (!$academicYear->ppdb) return $this->resolveForFailedResponseWith('PPDB masih belum dibuka. Silahkan hubungi admin untuk informasi lebih lanjut.', [], 403);

        StoreStudentCandidateAction::resolve()->execute($request);

        return $this->resolveForSuccessResponseWith('Berhasil mendaftar. Silahkan tunggu informasi selanjutnya.', [], 201);
    }
}
