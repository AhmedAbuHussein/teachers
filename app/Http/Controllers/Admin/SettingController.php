<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        if(!$setting){
            $setting = Setting::create(['id'=>1]);
        }
        return view('admin.settings.index', compact('setting'));
    }


    public function update(Request $request)
    {
        $request->validate([
            "email"=> "required|email",
            "phone"=> "nullable|numeric",
            "whatsapp"=> "nullable|numeric",
            "address1"=> "nullable|string",
            "address2"=> "nullable|string",
            "short_desc"=> "nullable|string",
            "about_title"=> "required|string",
            "about_text"=> "required|string",
            "image"=> "nullable|image",
        ]);
        $data = $request->except(['_method', '_token', 'image']);
        $setting = Setting::first();
        if(!$setting){
            $setting = Setting::create($data);
        }    
        if($request->hasFile('image')){
            $old = $setting->about_image;
            if($old){
                Storage::delete($old);
            }
            $name = "about_".time(). "_". Str::random() . ".". $request->file('image')->getClientOriginalExtension();
            Storage::putFileAs("images/", $request->file('image'), $name);
            $data['about_image'] = "images/$name";
        }
        $setting->update($data);
        return redirect()->route('dashboard.settings.index')->with([
            "message"=> "تم تعديل العنصر بنجاح",
            'icon'=> "success",
        ]);
    }
}
