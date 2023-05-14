<?php

namespace App\Actions;

use App\Enums\SettingPrefix;
use App\Models\Setting;

class FetchSettingAction extends Action
{
    public function execute(array|SettingPrefix $prefix)
    {
        $settings = Setting::prefix($prefix)
            ->pluck('value', 'variable');

        return $settings;
    }
}
