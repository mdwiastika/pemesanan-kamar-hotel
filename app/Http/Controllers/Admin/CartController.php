<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Room;
use App\Models\User;
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
        $carts = Cart::all();
        return view('admin.datamaster.carts.main', [
            'title' => 'Table Cart',
            'active' => 'datamaster',
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
        $users = User::where('role', 'user')->get();
        $rooms = Room::all();
        return view('admin.datamaster.carts.add', [
            'title' => 'Form Create Cart',
            'active' => 'datamaster',
            'rooms' => $rooms,
            'users' => $users,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'room_id' => 'required',
            'qty' => 'required',
            'check_in' => 'required',
            'check_out' => 'required',
        ]);
        Cart::create($validatedData);
        return redirect('/datamaster/carts')->with('message', 'Sukses Tambah Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        $new_cart = Cart::where('id', $cart->id)->with(['room', 'user'])->first();
        $users = User::where('role', 'user')->get();
        $rooms = Room::all();
        return view('admin.datamaster.carts.show', [
            'title' => 'Show Cart',
            'active' => 'datamaster',
            'cart' => $new_cart,
            'rooms' => $rooms,
            'users' => $users,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        $new_cart = Cart::where('id', $cart->id)->with(['room', 'user'])->first();
        $users = User::where('role', 'user')->get();
        $rooms = Room::all();
        return view('admin.datamaster.carts.edit', [
            'title' => 'Edit Cart',
            'active' => 'datamaster',
            'cart' => $new_cart,
            'rooms' => $rooms,
            'users' => $users,
        ]);
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
        $validatedData = $request->validate([
            'user_id' => 'required',
            'room_id' => 'required',
            'qty' => 'required',
            'check_in' => 'required',
            'check_out' => 'required',
        ]);
        $cart->update($validatedData);
        return redirect('/datamaster/carts')->with('message', 'Suksek Edit Data');
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
        return redirect('/datamaster/carts')->with('message', 'Sukses Hapus Data');
    }
}
