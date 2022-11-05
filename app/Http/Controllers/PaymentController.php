<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Product;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        return "index";
    }

    public function buy(Request $request, $product)
    {
        $count = $request->count ?? 1;
        $item = Product::where(['id'=> $product, 'is_active'=> 1])->first();
        if(!$item) return redirect()->route('products.index')->with([
            'message'=> "لم يتم العثور علي المنتج",
            "icon"=> "warning"
        ]);

        if($count > $item->stock){
            return redirect()->route('products.show', ['product'=> $product])->with([
                'message'=> "الكمية المطلوبة غير متوفره في الوقت الحالي",
                "icon"=> "info"
            ]);
        }
       
        $user = auth()->user();
        return view('payments.checkout', compact('item', 'count', 'user'));
    }

    public function checkout(Request $request, $product)
    {
        $request->validate([
            'count'=> 'required|numeric',
            "fname"=> "required|string",
            "lname"=> "required|string",
        ]);

        $item =Product::where(['is_active'=> 1 , 'id'=> $product])->first();
        if(!$item) return redirect()->route('products.index')->with([
            'message'=> "لم يتم العثور علي المنتج",
            "icon"=> "warning"
        ]);
        $user = auth()->user();
        $user->update($request->only(['fname', 'lname']));
        Payment::create([
            "user_id"=> $user->id,
            'product_id'=> $item->id,
            'count'=> $request->count,
            'type'=> 'cash',
            'total' => round($request->count * $item->discount_price ?? $item->price, 1)
        ]);
        $item->update(['stock' => $item->stock - $request->count]);

        return redirect()->route('products.index')->with([
            'message'=> "تمت العملية بنجاح",
            "icon"=> "success"
        ]);
    }
}
