<?php

namespace App\Http\Requests\AcademicYear;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAcademicYearRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'year' => ['required', 'string', 'max:10', 'unique:academic_years,year,' . $this->academicYear->id],
        ];
    }

    public function attributes()
    {
        return [
            'year' => 'Tahun'
        ];
    }

    public function authorize(): bool
    {
        return $this->user()->can('academic.year.edit');
    }
}
