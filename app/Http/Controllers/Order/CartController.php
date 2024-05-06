<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function store(Request $request)
    {
        try {
            $request->validate([
                'product_id' => 'required',
                'qty' => 'required',
            ]);
            $cart = new Cart();
            $cart->user_id = auth()->user()->id;
            $cart->product_id = $request->product_id;
            $cart->quantity = $request->qty;
            $cart->save();
            return back();
        } catch (\Throwable $th) {
            // throw $th;
        }
    }

    public function checkout(){
        return  view('frontend.checkout');
    }
}
