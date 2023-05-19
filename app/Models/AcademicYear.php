<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicYear extends Model
{
    use HasFactory;

    protected $fillable = [
        'year',
        'ppdb',
        'status',
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
