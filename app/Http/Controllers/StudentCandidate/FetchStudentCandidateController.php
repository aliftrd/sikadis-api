<?php

namespace App\Http\Controllers\StudentCandidate;

use App\DataTables\StudentCandidateDataTable;
use App\Http\Controllers\Controller;
use App\Models\StudentCandidate;

class FetchStudentCandidateController extends Controller
{
    public function __construct()
    {
        $this->middleware(['can:student.candidate.view']);
    }

    public function __invoke(StudentCandidateDataTable $dataTable)
    {
        return $dataTable->render('pages.student-candidate.index');
    }
}
