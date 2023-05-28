<?php

namespace App\Http\Controllers\StudentCandidate;

use App\Actions\StudentCandidate\DestroyStudentCandidateAction;
use App\Enums\FlashType;
use App\Http\Controllers\Controller;
use App\Models\StudentCandidate;

class DestroyStudentCandidateController extends Controller
{
    public function __construct()
    {
        $this->middleware(['can:student.candidate.destroy']);
    }

    public function __invoke(StudentCandidate $studentCandidate)
    {
        DestroyStudentCandidateAction::resolve()->execute($studentCandidate);

        return $this->resolveForRedirectResponseWith('admin.student-candidates.index', FlashType::SUCCESS, 'Calon siswa berhasil dihapus');
    }
}
