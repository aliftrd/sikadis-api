<?php

namespace App\Http\Controllers\StudentCandidate;

use App\Actions\StudentCandidate\UpdateStudentCandidateAction;
use App\Enums\FlashType;
use App\Http\Controllers\Controller;
use App\Http\Requests\StudentCandidate\UpdateStudentCandidateRequest;
use App\Models\StudentCandidate;

class UpdateStudentCandidateController extends Controller
{
    public function __construct()
    {
        $this->middleware(['can:student.candidate.edit']);
    }

    public function edit(StudentCandidate $studentCandidate)
    {
        return view('pages.student-candidate.form', compact('studentCandidate'));
    }

    public function update(UpdateStudentCandidateRequest $request, StudentCandidate $studentCandidate)
    {
        UpdateStudentCandidateAction::resolve()->execute($request, $studentCandidate);

        return $this->resolveForRedirectResponseWith('admin.student-candidates.index', FlashType::SUCCESS, 'Calon siswa berhasil diperbarui.');
    }
}
