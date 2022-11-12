<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Course;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{

    public function create($level)
    {
        return view('library.courses.create', compact('level'));
    }

    public function store(Request $request, $level)
    {
        $request->validate([
            "title"=> 'required|string',
            "code"=> 'required|string',
            "extra_url"=> 'nullable|url', 
            "text"=> 'nullable|string',
            "image"=> "nullable|image",
        ]);
        $data = $request->except(["_token", '_method', 'image']);
        $data['level_id'] = auth()->user()->level_id;
        $data['user_id'] = auth()->id();
        
        if($request->hasFile('image')){
            $name = "course_" . time(). "_". Str::random() . ".". $request->file('image')->getClientOriginalExtension();
            Storage::putFileAs("images/", $request->file('image'), $name);
            $data['image'] = "images/$name";
        }

        Course::create($data);

        return redirect()->route('profile.index')->with([
            "message"=> "تم اضافة العنصر بنجاح",
            'icon'=> "success",
        ]);
    }

    public function edit($level, Course $course)
    {
        if($course->user_id != auth()->id()){
            return redirect()->route('profile.index')->with([
                "message"=> "التعديل غير مصرح به",
                "icon"=> "error",
            ]);
        }
        return view('library.courses.edit', compact('course', 'level'));
    }


    public function update(Request $request, $level, Course $course)
    {
        $request->validate([
            "title"=> 'required|string',
            "code"=> 'required|string',
            "extra_url"=> 'nullable|url', 
            "text"=> 'nullable|string',
            "image"=> "nullable|image",
        ]);
        $data = $request->except(["_token", '_method', 'image']);
        $data['level_id'] = auth()->user()->level_id;
        
        if($request->hasFile('image')){
            $old = $course->image;
            if($old){
                Storage::delete($old);
            }
            $name = "course_" . time(). "_". Str::random() . ".". $request->file('image')->getClientOriginalExtension();
            Storage::putFileAs("images/", $request->file('image'), $name);
            $data['image'] = "images/$name";
        }

        $course->update($data);

        return redirect()->route('profile.index')->with([
            "message"=> "تم تعديل العنصر بنجاح",
            'icon'=> "success",
        ]);
    }

    public function delete($level,Course $course)
    {
        if($course->user_id != auth()->id()){
            return response()->json(['message'=> "خطا في رقم المعرف للدرس"], 400);
        }
        $old = $course->image;
        if($old){
            Storage::delete($old);
        }
        $course->delete();
        return response()->json(['done']);
    }
}
