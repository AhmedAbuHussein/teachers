<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Course;
use App\Models\News;
use App\Models\User;

class IndexController extends Controller
{
    public function index()
    {
        $users = User::count();
        $news = News::count();
        $comments = Comment::count();
        $courses = Course::count();
        return view('supervisor.index', compact('users', 'news', 'comments', 'courses'));
    }
}
