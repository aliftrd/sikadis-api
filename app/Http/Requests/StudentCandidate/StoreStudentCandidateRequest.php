<?php

namespace App\Http\Requests\StudentCandidate;

use App\Enums\GenderType;
use App\Enums\ReligionType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Validation\Rules\File;

class StoreStudentCandidateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'nik' => ['required', 'numeric', 'digits:16', 'unique:student_candidates,nik'],
            'fullname' => ['required', 'string', 'max:255'],
            'birthplace' => ['required', 'string', 'max:255'],
            'birthdate' => ['required', 'date'],
            'gender' => ['required', 'string', new Enum(GenderType::class)],
            'religion' => ['required', 'string', new Enum(ReligionType::class)],
            'father_name' => ['required', 'string', 'max:255'],
            'father_occupation' => ['required', 'string', 'max:255'],
            'mother_name' => ['required', 'string', 'max:255'],
            'mother_occupation' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'guardian_name' => ['nullable', 'string', 'max:255'],
            'guardian_occupation' => ['nullable', 'string', 'max:255'],
            'guardian_address' => ['nullable', 'string', 'max:255'],
            'files' => [File::types(['pdf', 'png', 'jpg', 'jpeg'])
                ->min(0)
                ->max(10 * 1024),],
        ];
    }
}
