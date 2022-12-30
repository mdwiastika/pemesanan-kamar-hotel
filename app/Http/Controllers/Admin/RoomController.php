<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::all();
        return view('admin.datamaster.rooms.main', [
            'title' => 'Table Room',
            'active' => 'datamaster',
            'rooms' => $rooms,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.datamaster.rooms.add', [
            'title' => 'Table Room',
            'active' => 'datamaster',
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
            'name' => 'required',
            'description' => 'required',
            'room_available' => 'required',
            'price' => 'required',
            'size' => 'required',
            'max_guest' => 'required',
        ]);
        if ($request->has('image')) {
            $validatedData['image'] = $request->file('image')->store('rooms');
        }
        Room::create($validatedData);
        return redirect('/datamaster/rooms')->with('message', 'Sukses Tambah Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        return view('admin.datamaster.rooms.show', [
            'title' => 'Table Room',
            'active' => 'datamaster',
            'room' => $room,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        return view('admin.datamaster.rooms.edit', [
            'title' => 'Table Room',
            'active' => 'datamaster',
            'room' => $room,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'room_available' => 'required',
            'price' => 'required',
            'size' => 'required',
            'max_guest' => 'required',
        ]);
        if ($request->has('image')) {
            Storage::delete($room->image);
            $validatedData['image'] = $request->file('image')->store('rooms');
        }
        $room->update($validatedData);
        return redirect('/datamaster/rooms')->with('message', 'Sukses Edit Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        Storage::delete($room->image);
        $room->delete();
        return redirect('/datamaster/rooms')->with('message', 'Sukses Hapus Kamar');
    }
}
