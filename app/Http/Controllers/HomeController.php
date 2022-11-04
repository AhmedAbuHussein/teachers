<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Privacy;
use App\Models\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
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
