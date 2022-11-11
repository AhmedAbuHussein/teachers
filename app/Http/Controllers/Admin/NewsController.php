<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index()
    {
        $items = News::get();
        return view('admin.news.index', compact('items'));
    }

    public function create()
    {
        $categories = Category::get();
        return view('admin.news.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            "title"=> 'required|string',
            "text"=> "required|string",
            'category_id'=> "required|numeric|exists:categories,id",
            "image"=> "required|image",
        ]);
        $data = $request->except(['image', "_token", '_method']);
        if($request->hasFile("image")){
            $name = "news_" . time(). "_". Str::random() . ".". $request->file("image")->getClientOriginalExtension();
            Storage::putFileAs("images/", $request->file("image"), $name);
            $data["image"] = "images/$name";
        }
        
        News::create($data);

        return redirect()->route('dashboard.news.index')->with([
            "message"=> "تم اضافة العنصر بنجاح",
            'icon'=> "success",
        ]);
    }

    public function edit(News $news)
    {
        $categories = Category::get();
        return view('admin.news.edit', compact('news', 'categories'));
    }

    public function update(Request $request, News $news)
    {
        $request->validate([
            "title"=> 'required|string',
            "text"=> "required|string",
            'category_id'=> "required|numeric|exists:categories,id",
            "image"=> "required|image",
        ]);

        $data = $request->except(['image', "_token", '_method']);
        if($request->hasFile("image")){
            $old = $news->image;
            if($old){
                Storage::delete($old);
            }
            $name = "news_" . time(). "_". Str::random() . ".". $request->file("image")->getClientOriginalExtension();
            Storage::putFileAs("images/", $request->file("image"), $name);
            $data["image"] = "images/$name";
        }

        $news->update($data);

        return redirect()->route('dashboard.news.index')->with([
            "message"=> "تم تعديل العنصر بنجاح",
            'icon'=> "success",
        ]);
    }

    public function destroy(News $news)
    {
        $old = $news->image;
        if($old){
            Storage::delete($old);
        }
        $news->delete();
        return redirect()->route('dashboard.news.index')->with([
            "message"=> "تم حذف العنصر بنجاح",
            'icon'=> "success",
        ]);

    }
}
