<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Material;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MaterialController extends Controller
{

    public function alldata($course)
    {
        $items = Material::where('course_id', $course)->get();
        return view('library.material.all', compact('items', 'course'));
    }

    public function create($course)
    {
        return view('library.material.create', compact('course'));
    }

    public function store(Request $request, $course)
    {
        $request->validate([
            "title"=> 'required|string',
            "type"=> "required|string|in:text,file,url",
            "text"=> "nullable|required_if:type,text|string",
            "url"=> "nullable|required_if:type,url|string",
            "src"=> "nullable|sometimes|required_if:type,file",
        ]);
        $data = $request->except(["src", "text", "url", "_token", '_method']);
        $data['course_id']= $course;
        
        if(in_array($request->type, ["file"])){
            if($request->hasFile("src")){
                $name = "material_" . time(). "_". Str::random() . ".". $request->file("src")->getClientOriginalExtension();
                Storage::putFileAs("images/", $request->file("src"), $name);
                $data["src"] = "images/$name";
            }

        }else if($request->type == 'url'){
            $data['src'] = $request->url;
        }else{
            $data['src'] = $request->text;
        }
        
        Material::create($data);

        return redirect()->route('library.courses.materials.all', ['course'=> $course])->with([
            "message"=> "تم اضافة العنصر بنجاح",
            'icon'=> "success",
        ]);
    }


    public function edit($course, Material $material)
    {
        return view('library.material.edit', compact('course', 'material'));
    }


    public function update(Request $request, $course, Material $material)
    {
        $request->validate([
            "title"=> 'required|string',
            "type"=> "required|string|in:text,file,url",
            "text"=> "nullable|required_if:type,text|string",
            "url"=> "nullable|required_if:type,url|string",
            "src"=> "nullable|sometimes|required_if:type,file",
        ]);
        $data = $request->except(["src", "text", "url", "_token", '_method']);
        $data['course_id']= $course;
        
        if(in_array($request->type, ["file"])){
            if($request->hasFile("src")){
                $old = $material->src;
                if($old && array_key_exists($material->type, ["file"])){
                    Storage::delete($old);
                }
                $name = "material_" . time(). "_". Str::random() . ".". $request->file("src")->getClientOriginalExtension();
                Storage::putFileAs("images/", $request->file("src"), $name);
                $data["src"] = "images/$name";
            }
        }else if($request->type == 'url'){
            $old = $material->src;
            if($old && array_key_exists($material->type, ["file"])){
                Storage::delete($old);
            }
            $data['src'] = $request->url;
        }else{
            $old = $material->src;
            if($old && array_key_exists($material->type, ["file"])){
                Storage::delete($old);
            }
            $data['src'] = $request->text;
        }
        
        $material->update($data);

        return redirect()->route('library.courses.materials.all', ['course'=> $course])->with([
            "message"=> "تم تعديل العنصر بنجاح",
            'icon'=> "success",
        ]);
    }


    public function index($level, $course)
    {
        $items = Material::where('course_id', $course)->get();
        return view('library.material.index', compact('items'));
    }

    public function show($level, Course $course)
    {
        return view('library.material.show', compact('course'));
    }

  
}

