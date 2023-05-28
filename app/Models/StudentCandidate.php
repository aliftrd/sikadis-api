<?php

namespace App\Models;

use App\Enums\GenderType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class StudentCandidate extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    const FILE_COLLECTION = 'student-candidate-files';

    protected $fillable = [
        'academic_year_id',
        'nik',
        'fullname',
        'birthplace',
        'birthdate',
        'gender',
        'religion',
        'father_name',
        'father_occupation',
        'mother_name',
        'mother_occupation',
        'address',
        'guardian_name',
        'guardian_occupation',
        'guardian_address',
        'files',
    ];

    protected $casts = [
        'gender' => GenderType::class,
    ];

    public function academicYear()
    {
        return $this->belongsTo(AcademicYear::class);
    }

    public function scopeNik($query, $nik)
    {
        return $query->where('nik', $nik);
    }
}
