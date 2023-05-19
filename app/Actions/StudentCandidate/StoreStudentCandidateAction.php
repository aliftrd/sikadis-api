<?php

namespace App\Actions\StudentCandidate;

use App\Actions\AcademicYear\FetchActiveAcademicYearAction;
use App\Actions\Action;
use App\Actions\Upload\ResolveUploadAction;
use App\Http\Requests\StudentCandidate\StoreStudentCandidateRequest;
use App\Models\StudentCandidate;

class StoreStudentCandidateAction extends Action
{
    public function execute(StoreStudentCandidateRequest $request): void
    {
        $academicYear = FetchActiveAcademicYearAction::resolve()->execute();

        $studentCandidate = StudentCandidate::create([
            'academic_year_id' => $academicYear->id,
            'nik' => $request->nik,
            'fullname' => $request->fullname,
            'birthplace' => $request->birthplace,
            'birthdate' => $request->birthdate,
            'gender' => $request->gender,
            'religion' => $request->religion,
            'father_name' => $request->father_name,
            'father_occupation' => $request->father_occupation,
            'mother_name' => $request->mother_name,
            'mother_occupation' => $request->mother_occupation,
            'address' => $request->address,
            'guardian_name' => $request->guardian_name,
            'guardian_occupation' => $request->guardian_occupation,
            'guardian_address' => $request->guardian_address,
        ]);

        if ($request->hasFile('files')) {
            $studentCandidate->addMediaFromRequest('files')
                ->usingFileName(join('.', [md5(join('', [$request->file('files')->getClientOriginalName(), uniqid(), now()->timestamp])), $request->file('files')->getClientOriginalExtension()]))
                ->toMediaCollection(StudentCandidate::FILE_COLLECTION);
        }
    }
}
