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
                        <h2>Cart</h2>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li><span>Cart</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end of wpo-breadcumb-section-->
    <!-- cart-area start -->
    <div class="cart-area section-padding">
        <div class="container">
            <div class="form">
                <div class="cart-wrapper">
                    <div class="row">
                        <div class="col-12">
                                <table class="table-responsive cart-wrap">
                                    <thead>
                                        <tr>
                                            <th class="images images-b">Image</th>
                                            <th class="product-2">Product Name</th>
                                            <th class="pr">Quantity</th>
                                            <th class="ptice">Price</th>
                                            <th class="stock">Total Price</th>
                                            <th class="remove remove-b">Nomer Resi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $total_belanja = 0;
                                    @endphp
                                        @foreach ($bookings as $booking)
                                        @foreach ($booking->detail_booking as $det_bok)
                                        <tr>
                                            <td class="images"><img src="{{ asset('/storage/' . $det_bok->room->image) }}"
                                                    alt=""></td>
                                            <td class="product">
                                                <ul>
                                                    <li class="first-cart"> {{ $det_bok->room->name }}</li>
                                                    <li>Size : {{ $det_bok->room->size }}</li>
                                                    <li>Check-in : {{ Carbon::parse($det_bok->check_in)->format('d/m/Y') }}</li>
                                                    <li>Check-out : {{ Carbon::parse($det_bok->check_out)->format('d/m/Y') }}</li>
                                                    <li>Total : {{ Carbon::parse($det_bok->check_in)->diffInDays($det_bok->check_out) }} Day</li>
                                                </ul>
                                            </td>
                                            <td class="stock">
                                                <ul class="input-style">
                                                    <li class="quantity">
                                                        <input type="text" disabled value="{{ $det_bok->qty }}" />
                                                    </li>
                                                </ul>
                                            </td>
                                            <td class="ptice">Rp {{ number_format($det_bok->room->price, 0, '.', ',') }}
                                            </td>
                                            <td class="stock">Rp {{ number_format($det_bok->room->price * $det_bok->qty * (Carbon::parse($det_bok->check_in)->diffInDays($det_bok->check_out)), 0, '.', ',') }}
                                            </td>
                                            <td class="action">{{ $det_bok->nomer_resi }}</td>
                                        </tr>
                                        @endforeach
                                        @endforeach
                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- cart-area end -->
@endsection
