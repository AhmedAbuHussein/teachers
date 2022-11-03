<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $items = User::get();
        return view('admin.users.index', compact('items'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            "fname"     => 'required|string',
            "lname"     => 'required|string',
            "email"     => "required|email",
            "role"      => "required|string|in:admin,professor",
            "status"    => "required|string|in:active,inactive",
            "password"  => "required|string|confirmed",

            "phone"     => "nullable|string",
            "address"   => "nullable|string",
            "bio"       => "nullable|string",
            "image"     => "nullable|image",
        ]);
        $data = $request->except(["_token", '_method', 'image', "password_confirmation"]);
        if($request->hasFile("image")){
            $name = "user_" . time(). "_". Str::random() . ".". $request->file("image")->getClientOriginalExtension();
            Storage::putFileAs("images/", $request->file("image"), $name);
            $data["image"] = "images/$name";
        }
        User::create($data);

        return redirect()->route('dashboard.users.index')->with([
            "message"=> "تم اضافة العنصر بنجاح",
            'icon'=> "success",
        ]);
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            "fname"     => 'required|string',
            "lname"     => 'required|string',
            "email"     => "required|email",
            "role"      => "required|string|in:admin,professor",
            "status"    => "required|string|in:active,inactive",
            "password"  => "nullable|string|confirmed",

            "phone"     => "nullable|string",
            "address"   => "nullable|string",
            "bio"       => "nullable|string",
            "image"     => "nullable|image",
        ]);
        $data = $request->except(["_token", '_method', 'image', "password_confirmation"]);
        if($request->hasFile("image")){
            $old = $user->image;
            if($old){
                Storage::delete($old);
            }
            $name = "user_" . time(). "_". Str::random() . ".". $request->file("image")->getClientOriginalExtension();
            Storage::putFileAs("images/", $request->file("image"), $name);
            $data["image"] = "images/$name";
        }

        $user->update($data);

        return redirect()->route('dashboard.users.index')->with([
            "message"=> "تم تعديل العنصر بنجاح",
            'icon'=> "success",
        ]);
    }

    public function destroy(User $user)
    {
        $old = $user->image;
        if($old){
            Storage::delete($old);
        }
        $user->delete();
        return redirect()->route('dashboard.users.index')->with([
            "message"=> "تم حذف العنصر بنجاح",
            'icon'=> "success",
        ]);

    }
}
