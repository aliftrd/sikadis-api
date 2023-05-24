<?php

namespace App\Http\Controllers\Api;

use App\Actions\FetchSettingAction;
use App\Enums\SettingPrefix;
use App\Http\Controllers\Controller;

class FetchMetaController extends Controller
{
    public function __invoke()
    {
        $contacts = FetchSettingAction::resolve()->execute([SettingPrefix::CONTACT])->toArray();

        return $this->resolveForSuccessResponseWith('Berhasil mengambil data.', $contacts);
    }
}
