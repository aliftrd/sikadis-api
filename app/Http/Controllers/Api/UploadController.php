<?php

namespace App\Http\Controllers\Api;

use App\Actions\Upload\ResolveRevertAction;
use App\Actions\Upload\ResolveUploadAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function upload(Request $request)
    {
        $storedFile = ResolveUploadAction::resolve()->execute($request);

        return $this->resolveForSuccessResponseWith('File uploaded successfully', [
            'path' => $storedFile
        ]);
    }

    public function revert(Request $request)
    {
        ResolveRevertAction::resolve()->execute($request);

        return $this->resolveForSuccessResponseWith('File reverted successfully');
    }
}
