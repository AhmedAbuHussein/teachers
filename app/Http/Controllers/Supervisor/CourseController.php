<?php

namespace App\Http\Controllers\Supervisor;

use App\Models\Level;
use App\Models\Course;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    public function index()
    {
        $items = Course::withCount("materials")->with('level')->get();
        return view('supervisor.courses.index', compact('items'));
    }

    public function create()
    {
        $levels = Level::get();
        return view('supervisor.courses.create', compact('levels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            "title"=> 'required|string',
            "code"=> 'required|string',
            "is_active"=> 'required|boolean',
            "level_id"=> 'required|numeric',
            "extra_url"=> 'nullable|url', 
            "text"=> 'nullable|string',
            "image"=> "nullable|image",
        ]);
        $data = $request->except(["_token", '_method', 'image']);
        if($request->hasFile('image')) {
            $name = "course_" . time(). "_". Str::random() . ".". $request->file('image')->getClientOriginalExtension();
            Storage::putFileAs("images/", $request->file('image'), $name);
            $data['image'] = "images/$name";
        }
        Course::create($data);

        return redirect()->route('supervisor.courses.index')->with([
            "message"=> "تم اضافة العنصر بنجاح",
            'icon'=> "success",
        ]);
    }

    public function edit(Course $course)
    {
        $levels = Level::get();
        return view('supervisor.courses.edit', compact('course', 'levels'));
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            "title"=> 'required|string',
            "code"=> 'required|string',
            "is_active"=> 'required|boolean',
            "level_id"=> 'required|numeric',
            "extra_url"=> 'nullable|url', 
            "text"=> 'nullable|string',
            "image"=> "nullable|image",
        ]);
        $data = $request->except(["_token", '_method', 'image']);

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

        return redirect()->route('supervisor.courses.index')->with([
            "message"=> "تم تعديل العنصر بنجاح",
            'icon'=> "success",
        ]);
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('supervisor.courses.index')->with([
            "message"=> "تم حذف العنصر بنجاح",
            'icon'=> "success",
        ]);

    }
}
