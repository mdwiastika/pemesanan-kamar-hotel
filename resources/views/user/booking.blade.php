@php
    use Carbon\Carbon;
@endphp
@extends('user.layout.app')
@section('content')
    <!-- start of breadcumb-section -->
    <div class="wpo-breadcumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="wpo-breadcumb-wrap">
                        <h2>Checkout</h2>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li><span>Checkout</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end of wpo-breadcumb-section-->

    <!-- wpo-checkout-area start-->
    <div class="wpo-checkout-area section-padding">
        <div class="container">
            <form action="/booking" method="POST">
                @csrf
                <div class="checkout-wrap">
                    <div class="row">
                        <div class="col-lg-8 col-12">
                            <div class="caupon-wrap s2">
                                <div class="biling-item">
                                    <div class="coupon coupon-3">
                                        <label id="toggle2">Billing Address</label>
                                    </div>
                                    <div class="billing-adress" id="open2">
                                        <div class="contact-form form-style">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-12 col-12">
                                                    <label for="fname1">Username</label>
                                                    <input type="text" placeholder="" value="{{ auth()->user()->name }}" id="fname1" name="fname">
                                                </div>
                                                <div class="col-lg-6 col-md-12 col-12">
                                                    <label for="email4">Email Adress</label>
                                                    <input type="text" placeholder="" value="{{ auth()->user()->email }}" id="email4" name="email">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="biling-item-2">
                                            <div class="note-area">
                                                <p>Order Notes </p>
                                                <textarea name="massage"
                                                    placeholder="Note about your order"></textarea>
                                            </div>
                                            <div class="submit-btn-area">
                                                <ul>
                                                    <li><button class="theme-btn" type="submit">Checkout Now</button></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="cout-order-area">
                                <div class="oreder-item ">
                                    <ul>
                                        <li class="o-header">Your Order<span>( {{ $carts->count() }} )</span></li>
                                        @php
                                            $total_transaksi = 0;
                                        @endphp
                                        @foreach ($carts as $cart)
                                        @php
                                            $total_transaksi += ($cart->room->price * $cart->qty * Carbon::parse($cart->check_in)->diffInDays($cart->check_out));
                                        @endphp
                                            <li>{{ $cart->room->name }}<span>{{ $cart->qty }} X {{ number_format($cart->room->price, 0, '.', ',') }} ({{ Carbon::parse($cart->check_in)->diffInDays($cart->check_out) }} Day)</span></li>
                                        @endforeach
                                        <li class="o-bottom">Total price <span>Rp {{ number_format($total_transaksi, 0, '.', ',') }}</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- wpo-checkout-area end-->
@endsection