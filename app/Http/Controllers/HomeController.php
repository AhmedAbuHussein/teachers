<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use App\Models\Course;
use App\Models\News;
use App\Models\Privacy;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::inRandomOrder()->limit(3)->get();
        $news = News::inRandomOrder()->limit(6)->get();
        $courses = Course::where(['is_active'=> 1])->inRandomOrder()->limit(6)->get();
        return view('home', compact('categories', 'news', 'courses'));
    }

    public function about()
    {
        $about = Setting::first();
        return view('about', compact('about'));
    }

    public function contact()
    {
        $setting = Setting::first();
        return view('contact', compact('setting'));
    }

    public function privacy()
    {
        $items = Privacy::get();
        return view('privacy', compact('items'));
    }

    public function contactstore(Request $request)
    {
        $request->validate([
            'fname'=> "required|string",
            'lname'=> "required|string",
            'email'=> "required|string",
            'title'=> "required|string",
            'text'=> "required|string",
        ]);

        Contact::create($request->except(['_token', '_method']));

        return redirect()->route('contact')->with([
            "message"=> "سيتم التواصل معك قريبا",
            'icon'=> "success",
        ]);
    }

}
