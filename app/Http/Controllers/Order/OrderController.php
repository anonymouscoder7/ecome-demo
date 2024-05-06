<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $order =  new Order();
        $order->name = $request->name;
        $order->address = $request->address;
        $order->contact = $request->contact;
        $order->note = $request->note;
        $order->payment_method = $request->payment_method;
        $order->save();

        $carts = Cart::where('user_id', auth()->user()->id)->get();
        $total = 0;
        foreach ($carts as $cart) {
            $order_details = new OrderDetails();
            $order_details->order_id = $order->id;
            $order_details->product_id = $cart->product_id;

            $product = Product::find($cart->product_id);
            
            $order_details->quantity = $cart->quantity;
            $order_details->unit_price = $product->price;
            $order_details->save();

            $cart->delete();
            
            $total += $order_details->quantity * $order_details->unit_price;
        }

        if ($request->payment_method == 'khalti') {
            $url = '/pay-with-khalti/' . $total . '/' . $order->id;
            return redirect($url);
        }
        return redirect()->back()->with('message', 'Sucessfully Ordered');
    }

    function payWithKhalti($price, $id)
    {
        return view('frontend.payWithKhalti', compact('price', 'id'));
    }

    function changeOrderStatus($id)
    {
        $order  = Order::find($id);
        $order->payment_status = 'paid';
        $order->update();

        return redirect('/');
    }
}
