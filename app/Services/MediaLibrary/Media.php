<?php

namespace App\Services\MediaLibrary;

use Spatie\MediaLibrary\MediaCollections\Models\Media as BaseMedia;

class Media extends BaseMedia
{
    public function getHighestOrderNumber(): int
    {
        return (int)static::where('model_type', $this->model_type)
            ->where('model_id', $this->model_id)
            ->where('collection_name', $this->collection_name)
            ->max($this->determineOrderColumnName());
    }
}
