<?php

namespace App\Http\Controllers\StudentCandidate;

use App\Http\Controllers\Controller;
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

    public function update(Request $request, StudentCandidate $studentCandidate)
    {

    }
}
