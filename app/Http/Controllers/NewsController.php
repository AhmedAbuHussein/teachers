<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->q;
        $category = $request->category;

        $items = News::when($search , function($query) use ($search) {
            $query->where(function($builder) use($search) {
                $builder->where('title', "LIKE","%$search%")
                ->orWhere('text', 'LIKE', "%$search%");
            });
        })
        ->when($category , function($query) use ($category) {
            $query->where('category_id', $category);
        })
        ->paginate(12);
        $categories = Category::get();
        return view('news.index', compact('items', 'categories'));
    }


    public function show($news)
    {
        $item = News::where(["id"=> $news])->first();
        if(!$item) return redirect()->route('news.index')->with([
            'message'=> "لم يتم العثور علي اخبار",
            "icon"=> "warning"
        ]);

        $items = News::where(['category_id'=> $item->category_id])->inRandomOrder()->limit(6)->get();
        return view('news.show', compact('item', 'items'));
    }
}
