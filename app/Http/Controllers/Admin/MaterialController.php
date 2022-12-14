<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use App\Models\Material;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class MaterialController extends Controller
{
    public function index()
    {
        $items = Material::get();
        return view('admin.materials.index', compact('items'));
    }

    public function create()
    {
        $courses = Course::get();
        return view('admin.materials.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            "title"=> 'required|string',
            "type"=> "required|string|in:text,file,url",
            "text"=> "nullable|required_if:type,text|string",
            "url"=> "nullable|required_if:type,url|string",
            "src"=> "nullable|sometimes|required_if:type,file",
            "course_id"=> 'required|numeric|exists:courses,id',
        ]);
        $data = $request->except(["src", "text", "url", "_token", '_method']);
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

        return redirect()->route('dashboard.materials.index')->with([
            "message"=> "تم اضافة العنصر بنجاح",
            'icon'=> "success",
        ]);
    }

    public function edit(Material $material)
    {
        $courses = Course::get();
        return view('admin.materials.edit', compact('material', 'courses'));
    }

    public function update(Request $request, Material $material)
    {
       
        $request->validate([
            "title"=> 'required|string',
            "type"=> "required|string|in:text,file,url",
            "text"=> "nullable|required_if:type,text|string",
            "url"=> "nullable|required_if:type,url|string",
            "src"=> "nullable|sometimes|required_if:type,file",
            "course_id"=> 'required|numeric|exists:courses,id',
        ]);
        $data = $request->except(["src","text", "url", "_token", '_method']);
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

        return redirect()->route('dashboard.materials.index')->with([
            "message"=> "تم تعديل العنصر بنجاح",
            'icon'=> "success",
        ]);
    }

    public function destroy(Material $material)
    {
        $old = $material->src;
        if($old && array_key_exists($material->type, ["file"])){
            Storage::delete($old);
        }
        $material->delete();
        return redirect()->route('dashboard.materials.index')->with([
            "message"=> "تم حذف العنصر بنجاح",
            'icon'=> "success",
        ]);

    }
}
