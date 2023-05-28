<?php

namespace App\Actions\StudentCandidate;

use App\Actions\Action;
use App\Models\StudentCandidate;

class DestroyStudentCandidateAction extends Action
{
    public function execute(StudentCandidate $studentCandidate): void
    {
        $studentCandidate->delete();
    }
}
