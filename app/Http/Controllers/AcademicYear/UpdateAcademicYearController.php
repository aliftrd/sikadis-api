<?php

namespace App\Http\Controllers\AcademicYear;

use App\Actions\AcademicYear\UpdateAcademicYearAction;
use App\Actions\AcademicYear\UpdateAcademicYearPpdbAction;
use App\Actions\AcademicYear\UpdateAcademicYearStatusAction;
use App\Enums\FlashType;
use App\Exceptions\AcademicYear\CannotUpdateCauseAcademicYearNonactiveException;
use App\Http\Controllers\Controller;
use App\Http\Requests\AcademicYear\UpdateAcademicYearRequest;
use App\Models\AcademicYear;

class UpdateAcademicYearController extends Controller
{
    public function __construct()
    {
        $this->middleware(['can:academic.year.edit']);
    }

    public function edit(AcademicYear $academicYear)
    {
        return view('pages.academic-year.form', compact('academicYear'));
    }

    public function update(UpdateAcademicYearRequest $request, AcademicYear $academicYear)
    {
        UpdateAcademicYearAction::resolve()->execute($request, $academicYear);

        return $this->resolveForRedirectResponseWith('admin.academic-years.index', FlashType::SUCCESS, 'Academic year updated successfully');
    }

    public function updateStatus(AcademicYear $academicYear)
    {
        try {
            UpdateAcademicYearStatusAction::resolve()->execute($academicYear);

            return $this->resolveForRedirectResponseWith('admin.academic-years.index', FlashType::SUCCESS, 'Status updated successfully');
        } catch (\Exception $e) {
            $message = match (true) {
                default => 'Something went wrong.',
            };

            return $this->resolveForRedirectResponseWith('admin.academic-years.index', FlashType::ERROR, $message);
        }
    }

    public function updatePpdb(AcademicYear $academicYear)
    {
        try {
            UpdateAcademicYearPpdbAction::resolve()->execute($academicYear);

            return $this->resolveForRedirectResponseWith('admin.academic-years.index', FlashType::SUCCESS, 'Status updated successfully');
        } catch (\Exception $e) {
            $message = match (true) {
                $e instanceof CannotUpdateCauseAcademicYearNonactiveException => $e->getMessage(),
                default => 'Something went wrong.',
            };

            return $this->resolveForRedirectResponseWith('admin.academic-years.index', FlashType::ERROR, $message);
        }
    }
}
