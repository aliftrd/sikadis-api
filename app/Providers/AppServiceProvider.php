<?php

namespace App\Providers;

use App\Actions\FetchSettingAction;
use App\Enums\SettingPrefix;
use App\Models\Setting;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        JsonResource::withoutWrapping();
        if (!$this->app->runningInConsole()) {
            $general_settings = FetchSettingAction::resolve()->execute(SettingPrefix::GENERAL);
            $general_settings->each(fn($value, $variable) => \View::share(join('_', ['WEBSITE', $variable]), $value));
        }
    }
}
