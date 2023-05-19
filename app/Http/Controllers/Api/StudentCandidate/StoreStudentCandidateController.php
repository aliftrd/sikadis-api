<?php

namespace App\Http\Controllers\Api\StudentCandidate;

use App\Actions\StudentCandidate\StoreStudentCandidateAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\StudentCandidate\StoreStudentCandidateRequest;

class StoreStudentCandidateController extends Controller
{
    public function __invoke(StoreStudentCandidateRequest $request)
    {
        StoreStudentCandidateAction::resolve()->execute($request);

        return $this->resolveForSuccessResponseWith('Successful registration, please wait for further information.', [], 201);
    }
}