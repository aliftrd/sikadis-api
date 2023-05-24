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

    public function attributes()
    {
        return [
            'nik' => 'NIK',
            'fullname' => 'Nama Lengkap',
            'birthplace' => 'Tempat Lahir',
            'birthdate' => 'Tanggal Tahun Lahir',
            'gender' => 'Jenis Kelamin',
            'religion' => 'Agama',
            'father_name' => 'Nama Ayah',
            'father_occupation' => 'Pekerjaan Ayah',
            'mother_name' => 'Nama Ibu',
            'mother_occupation' => 'Pekerjaan Ibu',
            'address' => 'Alamat',
            'guardian_name' => 'Nama Wali',
            'guardian_occupation' => 'Pekerjaan Wali',
            'guardian_address' => 'Alamat Wali',
            'files' => 'File Pendukung',
        ];
    }
}
