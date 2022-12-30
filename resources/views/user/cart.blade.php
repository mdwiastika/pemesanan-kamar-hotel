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
                                            <th class="remove remove-b">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $total_belanja = 0;
                                    @endphp
                                        @foreach ($carts as $cart)
                                            <tr>
                                                <td class="images"><img src="{{ asset('/storage/' . $cart->room->image) }}"
                                                        alt=""></td>
                                                <td class="product">
                                                    <ul>
                                                        <li class="first-cart"> {{ $cart->room->name }}</li>
                                                        <li>Size : {{ $cart->room->size }}</li>
                                                        <li>Check-in : {{ Carbon::parse($cart->check_in)->format('d/m/Y') }}</li>
                                                        <li>Check-out : {{ Carbon::parse($cart->check_out)->format('d/m/Y') }}</li>
                                                        <li>Total : {{ Carbon::parse($cart->check_in)->diffInDays($cart->check_out) }} Day</li>
                                                    </ul>
                                                </td>
                                                <td class="stock">
                                                    <ul class="input-style">
                                                        <input type="hidden" value="{{ $cart->id }}">
                                                        <li class="quantity cart-plus-minus">
                                                            <input type="text" class="qty_room" id="qty_room" value="{{ $cart->qty }}" />
                                                        </li>
                                                    </ul>
                                                </td>
                                                <td class="ptice">Rp {{ number_format($cart->room->price, 0, '.', ',') }}
                                                </td>
                                                <td class="stock" id="table_load_qty{{ $cart->id }}">Rp {{ number_format($cart->room->price * $cart->qty * (Carbon::parse($cart->check_in)->diffInDays($cart->check_out)), 0, '.', ',') }}
                                                </td>
                                                <td class="action">
                                                    <form action="/cart/{{ $cart->id }}" method="POST">
                                                        @method("delete")
                                                        @csrf
                                                        <button data-bs-toggle="tooltip" type="submit"
                                                            data-bs-html="true" title="Remove from Cart" style="background-color: transparent; border: none;"><i
                                                                class="fi ti-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @php
                                                $total_belanja += $cart->room->price * $cart->qty * (Carbon::parse($cart->check_in)->diffInDays($cart->check_out));
                                            @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                            <div class="cart-product-list">
                                <ul id="total_cart">
                                    <li>Total product<span>( {{ $carts->count() }} )</span></li>
                                    <li class="cart-b">Total Price<span>Rp {{ number_format($total_belanja, 0, '.',',') }}</span></li>
                                </ul>
                            </div>

                            <div class="submit-btn-area">
                                <ul>
                                    <li><a class="theme-btn" href="/booking">Proceed to Checkout <i
                                                class="fa fa-angle-double-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        let cart_wrap = document.querySelector('.cart-wrap');
        const _token = $('meta[name="csrf-token"]').attr('content')
        console.log(_token);
        cart_wrap.addEventListener('click', async function(e){
            if (e.target.className == 'inc qtybutton') {
                const qty_value = e.target.previousElementSibling.previousElementSibling.value;
                const cart_id = e.target.parentElement.previousElementSibling.value;
                const data ={
                    qty:qty_value,
                    id:cart_id
                }
                console.log(cart_id);
                await updateQty(cart_id, data);
            }else if (e.target.className == 'dec qtybutton') {
                const qty_value = e.target.previousElementSibling.value;
                const cart_id = e.target.parentElement.previousElementSibling.value;
                const data = {
                    qty:qty_value,
                    id:cart_id,
                }
                console.log(cart_id);

                await updateQty(cart_id, data);
            }
        });

        async function updateQty(id, data){
            console.log(data);
           const fetching = await fetch(`http://127.0.0.1:8000/api/change-qty/${id}`,{
            method:"POST",
            headers:{
                'X-CSRF-TOKEN': _token,
                'Content-type':'application/json',
            },
            body:JSON.stringify(data),
           });
           const hasil = await fetching.json();
           $(`#table_load_qty${id}`).load(`/cart #table_load_qty${id}`);
           $(`#total_cart`).load(`/cart #total_cart`);
        }
    </script>
    <!-- cart-area end -->
@endsection
