<?php

namespace App\Actions\Upload;

use App\Actions\Action;
use Illuminate\Http\Request;

class ResolveUploadAction extends Action
{
    public function execute(Request $request): string
    {
        $files = $request->allFiles();

        abort_if(empty($files), 422, 'No file uploaded');
        abort_if(count($files) > 1, 422, 'Only 1 file can be uploaded at a time.');

        $requestKey = array_key_first($files);

        $file = is_array($request->input($requestKey)) ? $request->file($requestKey)[0] : $request->file($requestKey);

        $timestamp = now()->timestamp;
        $extension = $file->getClientOriginalExtension();
        $filename = join('.', [md5(join('', [$file->getClientOriginalName(), uniqid(), $timestamp])), $extension]);

        return $file->storeAs(env('TEMPORARY_FOLDER', 'tmp'), $filename);
    }
}
