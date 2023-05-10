<?php

namespace App\Models;

use App\Enums\SettingPrefix;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    public function scopePrefix(Builder $query, int|string|array|SettingPrefix $filter): void
    {
        if (is_array($filter)) {
            $query->whereIn(column: 'prefix', values: $filter instanceof SettingPrefix ? $filter->value : $filter);
        } else {
            $query->where(column: 'prefix', operator: '=', value: $filter);
        }
    }

    public function scopeVariable(Builder $query, int|string $filter): void
    {
        $query->where(column: 'variable', operator: '=', value: $filter);
    }
}
