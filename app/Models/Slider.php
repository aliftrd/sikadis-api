<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Slider extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    const IMAGE_COLLECTION = 'image';

    protected $fillable = [
        'title',
    ];

    public function firstImage(): MorphOne
    {
        return $this->morphOne(config('media-library.media_model'), 'model')
            ->where('collection_name', self::IMAGE_COLLECTION)
            ->where('order_column', 1);
    }

    public function getMainImageUrlAttribute(): null|string
    {
        return $this->firstImage?->getUrl();
    }
}

