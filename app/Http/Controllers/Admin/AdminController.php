<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Course;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::count();
        $products = Product::count();
        $comments = Comment::count();
        $courses = Course::count();
        return view('admin.index', compact('users', 'products', 'comments', 'courses'));
    }
}
