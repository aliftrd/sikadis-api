<?php

namespace App\Http\Controllers;

use App\Actions\AcademicYear\FetchActiveAcademicYearAction;
use App\Actions\FetchSettingAction;
use App\Actions\Page\FetchPriorityPagesAction;
use App\Actions\Post\FetchPostsAction;
use App\Actions\Slider\FetchSlidersAction;
use App\Actions\StudentCandidate\StoreStudentCandidateAction;
use App\Enums\FlashType;
use App\Enums\SettingPrefix;
use App\Http\Requests\StudentCandidate\StoreStudentCandidateRequest;
use App\Models\Post;

class LandingController extends Controller
{
    public function __construct()
    {
        $implicitSetting = FetchSettingAction::resolve()->execute([SettingPrefix::CONTACT]);
        $priorityPages = FetchPriorityPagesAction::resolve()->execute();
        $academicYear = FetchActiveAcademicYearAction::resolve()->execute();

        \View::share('implicit_setting', $implicitSetting);
        \View::share('priority_pages', $priorityPages);
        \View::share('academic_year', $academicYear);
    }

    public function welcome()
    {
        $sliders = FetchSlidersAction::resolve()->execute()->response()->getData();
        $posts = FetchPostsAction::resolve()->execute()->response()->getData();
        $settings = FetchSettingAction::resolve()->execute([SettingPrefix::GREETINGS]);

        return view('pages.landing.welcome', compact('sliders', 'posts', 'settings'));
    }

    public function news()
    {
        $posts = FetchPostsAction::resolve()->execute()->response()->getData();

        return view('pages.landing.news', compact('posts'));
    }

    public function singleNews(Post $post)
    {
        $latestPosts = FetchPostsAction::resolve()->execute();
        $post->load(['category', 'firstImage']);

        return view('pages.landing.single-news', compact('latestPosts', 'post'));
    }

    public function ppdb()
    {
        $academicYear = FetchActiveAcademicYearAction::resolve()->execute();
        if (!$academicYear) return view('pages.landing.ppdb-not-open');

        return view('pages.landing.ppdb');
    }

    public function ppdbStore(StoreStudentCandidateRequest $request)
    {
        StoreStudentCandidateAction::resolve()->execute($request);

        return $this->resolveForRedirectResponseWith('landing.ppdb.index', FlashType::SUCCESS, 'Pendaftaran berhasil dikirimkan');
    }
}
