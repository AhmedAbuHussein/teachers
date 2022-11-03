<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $items = Category::withCount("products")->get();
        return view('admin.categories.index', compact('items'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            "title"=> 'required|string',
            "text"=> "required|string",
            "image"=> "sometimes|nullable|image",
        ]);
        $data = $request->only(['title', 'text']);
        if($request->hasFile('image')){
            $name = "category_" . time(). "_". Str::random() . ".". $request->file('image')->getClientOriginalExtension();
            Storage::putFileAs("images/", $request->file('image'), $name);
            $data['image'] = "images/$name";
        }
        Category::create($data);

        return redirect()->route('dashboard.categories.index')->with([
            "message"=> "تم اضافة العنصر بنجاح",
            'icon'=> "success",
        ]);
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            "title"=> 'required|string',
            "text"=> "required|string",
            "image"=> "sometimes|nullable|image",
        ]);
        $data = $request->only(['title', 'text']);
        if($request->hasFile('image')){
            $old = $category->image;
            if($old){
                Storage::delete($old);
            }
            $name = "category_".time(). "_". Str::random() . ".". $request->file('image')->getClientOriginalExtension();
            Storage::putFileAs("images/", $request->file('image'), $name);
            $data['image'] = "images/$name";
        }
        $category->update($data);

        return redirect()->route('dashboard.categories.index')->with([
            "message"=> "تم تعديل العنصر بنجاح",
            'icon'=> "success",
        ]);
    }

    public function destroy(Category $category)
    {
        $image = $category->image;
        if($image){
            Storage::delete($image);
        }
        $category->delete();
        return redirect()->route('dashboard.categories.index')->with([
            "message"=> "تم حذف العنصر بنجاح",
            'icon'=> "success",
        ]);
    }
}
