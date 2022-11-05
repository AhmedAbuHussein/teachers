<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->q;
        $category = $request->category;

        $items = Product::where('is_active', 1)
        ->when($search , function($query) use ($search) {
            $query->where(function($builder) use($search) {
                $builder->where('title', "LIKE","%$search%")
                ->orWhere('code', 'LIKE', "%$search%")
                ->orWhere('text', 'LIKE', "%$search%")
                ->orWhere('short_text', 'LIKE', "%$search%");
            });
        })
        ->when($category , function($query) use ($category) {
            $query->where('category_id', $category);
        })
        ->paginate(12);
        $categories = Category::get();
        return view('products.index', compact('items', 'categories'));
    }


    public function show($product)
    {
        $item = Product::where(["id"=> $product, 'is_active'=> 1])->first();
        if(!$item) return redirect()->route('products.index')->with([
            'message'=> "لم يتم العثور علي المنتج",
            "icon"=> "warning"
        ]);

        $items = Product::where(['category_id'=> $item->category_id, 'is_active'=> 1])->inRandomOrder()->limit(6)->get();
        return view('products.show', compact('item', 'items'));
    }
}
