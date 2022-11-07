<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('profile.index', compact('user'));
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
           "old_password"=> "required|string",
           "password"=> "required|string|confirmed",
        ]);

        $user = auth()->user();
        if(Hash::check($request->old_password, $user->password)){
            $user->update(['password'=> $request->password]);

            return redirect()->route('profile.index')->with([
                "message"=> "تم تعديل البيانات بنجاح",
                'icon'=> "success",
            ]);
        }

        return redirect()->route('profile.index')->with([
            "message"=> "خطا في كلمة السر القديمة",
            'icon'=> "warning",
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            "fname"=> "required|string",
            "lname"=> "required|string",
            "email"=> "required|email|unique:users,email,".auth()->id(),
            "phone"=> "nullable|string|numeric",
            "address"=> "nullable|string",
            "bio"=> "nullable|string",
        ]);

        $user = auth()->user();
        $user->update($request->except("_method", "_token"));

        return redirect()->route('profile.index')->with([
            "message"=> "تم تعديل البيانات بنجاح",
            'icon'=> "success",
        ]);
    }

    public function upload(Request $request)
    {
        $request->validate([
            "image"=> "required|image",
        ]);

        $user = auth()->user();
        if($request->hasFile('image')){
            $old = $user->image;
            if($old){
                Storage::delete($old);
            }
            $name = "user_". time() . Str::random() . '.'. $request->file('image')->getClientOriginalExtension();
            Storage::putFileAs("images/", $request->file("image"), $name);
            $user->update(["image" => "images/$name"]);
        }
        

        return redirect()->route('profile.index')->with([
            "message"=> "تم تحديث الصورة بنجاح",
            'icon'=> "success",
        ]);
    }
}
