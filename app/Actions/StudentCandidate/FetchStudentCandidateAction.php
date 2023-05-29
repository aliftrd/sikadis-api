<?php

namespace App\Actions\StudentCandidate;

use App\Actions\Action;
use App\Models\StudentCandidate;

class FetchStudentCandidateAction extends Action
{
    public function execute()
    {
        return StudentCandidate::query()
            ->with('academicYear')
            ->latest()
            ->limit(8)
            ->get();
    }
}
