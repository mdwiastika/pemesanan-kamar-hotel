<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Cart;
use App\Models\DetailBooking;
use App\Models\Room;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carts = Cart::where('user_id', auth()->user()->id)->where('qty', '>', 0)->get();
        return view('user.booking', [
            'title' => 'Form Booking',
            'carts' => $carts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $carts = Cart::where('user_id', auth()->user()->id)->where('qty', '>', 0)->get();
        $booking = Booking::create([
            'user_id' => auth()->user()->id,
        ]);
        foreach ($carts as $cart) {
            $detail_booking = DetailBooking::create([
                'nomer_resi' => '-',
                'booking_id' => $booking->id,
                'room_id' => $cart->room->id,
                'qty' => $cart->qty,
                'check_in' => $cart->check_in,
                'check_out' => $cart->check_out,
            ]);
            $id_detail = $detail_booking->id;
            $nomer_resi = 'TR-' . str_pad($id_detail, 4, '0', STR_PAD_LEFT);
            $detail_booking->update([
                'nomer_resi' => $nomer_resi,
            ]);
            $room = Room::where('id', $cart->room->id)->first();
            $room_qty = $room->room_available - $cart->qty;
            $room->update([
                'room_available' => $room_qty,
            ]);
        }
        $deleted_id_cart = $carts->pluck('id');
        Cart::whereIn('id', $deleted_id_cart)->delete();
        return redirect('/cart')->with('message', 'Pembelian Sukses');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
