<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carts = Cart::where('user_id', auth()->user()->id)->get();
        return view('user.cart', [
            'title' => 'My Cart',
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
        try {
            $validatedData = $request->validate([
                'room_id' => 'required',
                'check_in' => 'required',
                'check_out' => 'required',
            ]);
            $validatedData['check_in'] = Carbon::parse($request->check_in)->format('Y-m-d H:i:s');
            $validatedData['check_out'] = Carbon::parse($request->check_out)->format('Y-m-d H:i:s');
            $validatedData['user_id'] = auth()->user()->id;
            $validatedData['qty'] = 1;
            $cart = Cart::where('user_id', auth()->user()->id)->where('room_id', $request->room_id)->where('check_in', $validatedData['check_in'])->where('check_out', $validatedData['check_out'])->first();
            if ($cart) {
                $cart->update([
                    'qty' => $cart->qty + 1,
                ]);
                return redirect()->back()->with('message', 'Sukses tambah ke cart');
            }
            Cart::create($validatedData);
            return redirect()->back()->with('message', 'Sukses tambah ke cart');
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        $cart->delete();
        return back()->with('message', 'Sukes Hapus Data');
    }
    public function changeQty($id, Request $request)
    {
        try {
            $cart = Cart::where('id', $id)->first();
            $cart->update([
                "qty" => $request->qty,
            ]);
            return response()->json([
                'message' => 'Sukses update qty',
                'data' => $cart,
                'qty' => $request->qty,
            ], 202);
        } catch (\Throwable $th) {
            return response()->json(['mesage' => $th->getMessage(), 're' => $request->qty], 503);
        }
    }
}
