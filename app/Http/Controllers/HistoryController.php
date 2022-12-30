<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function main()
    {
        $bookings = Booking::where('user_id', auth()->user()->id)->get();
        return view('user.history', [
            'title' => 'My History Transaction',
            'bookings' => $bookings,
        ]);
    }
}
