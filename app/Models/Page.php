<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Page extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, Sluggable;

    const IMAGE_COLLECTION = 'thumbnail';

    protected $fillable = [
        'title',
        'slug',
        'content',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
                'onUpdate' => true,
            ],
        ];
    }

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
