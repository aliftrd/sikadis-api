<?php

namespace App\Http\Controllers;

use App\Actions\Post\FetchPostsAction;
use App\Actions\StudentCandidate\FetchStudentCandidateAction;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function __invoke()
    {
        $studentCandidates = FetchStudentCandidateAction::resolve()->execute();
        $latestPosts = FetchPostsAction::resolve()->execute();

        return view('pages.dashboard', compact('studentCandidates', 'latestPosts'));
    }
}
