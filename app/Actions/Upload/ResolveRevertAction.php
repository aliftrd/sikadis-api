<?php

namespace App\Actions\Upload;

use App\Actions\Action;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ResolveRevertAction extends Action
{
    public function execute(?string $filePath): bool
    {
        if (!$filePath) return false;

        if (!Storage::exists($filePath)) return false;

        return Storage::delete($filePath);
    }
}
