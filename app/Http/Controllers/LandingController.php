<?php

namespace App\Http\Controllers;

use App\Actions\FetchSettingAction;
use App\Actions\Page\FetchPriorityPagesAction;
use App\Actions\Post\FetchPostsAction;
use App\Actions\Slider\FetchSlidersAction;
use App\Enums\SettingPrefix;

class LandingController extends Controller
{
    public function __construct()
    {
        $implicit_settting = FetchSettingAction::resolve()->execute([SettingPrefix::CONTACT]);
        $priorityPages = FetchPriorityPagesAction::resolve()->execute();

        \View::share('implicit_setting', $implicit_settting);
        \View::share('priority_pages', $priorityPages);
    }

    public function welcome()
    {
        $sliders = FetchSlidersAction::resolve()->execute()->response()->getData();
        $posts = FetchPostsAction::resolve()->execute()->response()->getData();
        $settings = FetchSettingAction::resolve()->execute([SettingPrefix::GREETINGS]);

        return view('pages.landing.welcome', compact('sliders', 'posts', 'settings'));
    }
}
