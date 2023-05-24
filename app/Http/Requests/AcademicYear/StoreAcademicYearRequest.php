<?php

namespace App\Http\Requests\AcademicYear;

use Illuminate\Foundation\Http\FormRequest;

class StoreAcademicYearRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'year' => ['required', 'string', 'max:10', 'unique:academic_years,year'],
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
        return $this->user()->can('academic.year.create');
    }
}
