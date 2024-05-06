@extends('frontend.layout.main')
@section('title','Home')

@section('content')
<?php

use App\Models\Cart;

if (auth()->user()) {
    $carts = Cart::where('user_id', auth()->user()->id)->get();
} else {
    $carts = null;
}

?>
<div class="Checkout_section mt-60">
    <div class="container">
        <div class="row">
            @if(session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
            @endif
            @if(Auth::user())
            <div class="checkout_form">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <form action="/order" method="post">
                            @csrf
                            <h3>Billing Details</h3>
                            <div class="row">

                                <div class="col-lg-12 mb-20">
                                    <label> Name <span>*</span></label>
                                    <input type="text" class="form-control" name="name">
                                </div>

                                <div class="col-12 mb-20">
                                    <label>Address <span>*</span></label>
                                    <input class="form-control" placeholder="House number and street name" name="address" type="text">
                                </div>

                                <div class="col-lg-6 mb-20">
                                    <label>Phone<span>*</span></label>
                                    <input class="form-control" type="text" name="contact">

                                </div>

                                <div class="col-12">
                                    <div class="order-notes">
                                        <label for="order_note">Order Notes</label>
                                        <textarea class="form-control" id="order_note" name="note" rows="2" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                    </div>
                                </div>
                                <div class="payment_method">
                                    <div class="panel-default">
                                        <input id="payment"  name="payment_method" type="radio" value="cod" data-target="createp_account" />

                                        <label for="payment" data-toggle="collapse" data-target="#collapseThree" aria-controls="collapseThree">Cash On Delivery</label>

                                        <div id="collapseThree" class="collapse" data-parent="#accordionExample">
                                            <div class="card-body1">
                                                <p>Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-default">
                                        <input id="payment_defult" name="payment_method" value="khalti" type="radio" data-target="createp_account" />
                                        <label for="payment_defult" data-toggle="collapse" data-target="#collapseFour" aria-controls="collapseFour">Pay With Khalti <img src="assets/img/icon/papyel.png" alt=""></label>

                                        <div id="collapseFour" class="collapse" data-parent="#accordionExample">
                                            <div class="card-body1">
                                                <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal. <a href="#">What is Paypal?</a></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="order_button p-3">
                                        <button type="submit" class="btn btn-success">Proceed to buy</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <form action="#">
                            <h3>Your order</h3>
                            <div class="order_table table-responsive">
                                <table border="1">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>QTY</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $total = 0; ?>
                                        @foreach($carts as $cart)

                                        <tr>
                                            <td> {{$cart->product['name']}} </td>
                                            <td> <strong>Rs {{$cart->product->price}}</strong></td>
                                            <td><strong>{{$cart->quantity}}</strong></td>
                                        </tr>
                                        <?php $total = $total + ($cart->product->price * $cart->quantity); ?>

                                        @endforeach

                                    </tbody>
                                    <tfoot>

                                        <tr class="order_total">
                                            <th>Order Total</th>
                                            <td colspan="2"><strong>Rs {{$total}}</strong></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            @else
            <h3>Please Login</h3>
            @endif
        </div>
    </div>

    @endsection