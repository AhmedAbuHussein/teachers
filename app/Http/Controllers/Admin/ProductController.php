<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $items = Product::get();
        return view('admin.products.index', compact('items'));
    }

    public function create()
    {
        $categories = Category::get();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            "title"=> 'required|string',
            "code"=> "required|string",
            "price"=> "required|string",
            "discount_price"=> "nullable|string",
            "short_text"=> "required|string",
            "stock"=> "required|numeric",
            "category_id"=> "required|numeric|exists:categories,id",
            "is_active"=> "required|boolean",
            "is_feature"=> "required|boolean",
            "text"=> "required|string",

            "image1"=> "required|image",
            "image2"=> "required|image",
            "image3"=> "required|image",
        ]);
        $data = $request->except(['image1', 'image2', 'image3', "_token", '_method']);
        for($i=1;$i<=3;$i++){
            if($request->hasFile("image$i")){
                $name = "product_" . time(). "_". Str::random() . ".". $request->file("image$i")->getClientOriginalExtension();
                Storage::putFileAs("images/", $request->file("image$i"), $name);
                $data["image$i"] = "images/$name";
            }
        }
        
        Product::create($data);

        return redirect()->route('dashboard.products.index')->with([
            "message"=> "تم اضافة العنصر بنجاح",
            'icon'=> "success",
        ]);
    }

    public function edit(Product $product)
    {
        $categories = Category::get();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            "title"=> 'required|string',
            "code"=> "required|string",
            "price"=> "required|string",
            "discount_price"=> "nullable|string",
            "short_text"=> "required|string",
            "stock"=> "required|numeric",
            "category_id"=> "required|numeric|exists:categories,id",
            "is_active"=> "required|boolean",
            "is_feature"=> "required|boolean",
            "text"=> "required|string",

            "image1"=> "sometimes|nullable|image",
            "image2"=> "sometimes|nullable|image",
            "image3"=> "sometimes|nullable|image",
        ]);

        $data = $request->except(['image1', 'image2', 'image3', "_token", '_method']);
        for($i=1;$i<=3;$i++){
            if($request->hasFile("image$i")){
                $old = $product->{"image$i"};
                if($old){
                    Storage::delete($old);
                }
                $name = "product_" . time(). "_". Str::random() . ".". $request->file("image$i")->getClientOriginalExtension();
                Storage::putFileAs("images/", $request->file("image$i"), $name);
                $data["image$i"] = "images/$name";
            }
        }

        $product->update($data);

        return redirect()->route('dashboard.products.index')->with([
            "message"=> "تم تعديل العنصر بنجاح",
            'icon'=> "success",
        ]);
    }

    public function destroy(Product $product)
    {
        for($i=1;$i<=3;$i++){
            $old = $product->{"image$i"};
            if($old){
                Storage::delete($old);
            }
        }
        $product->delete();
        return redirect()->route('dashboard.products.index')->with([
            "message"=> "تم حذف العنصر بنجاح",
            'icon'=> "success",
        ]);

    }
}
