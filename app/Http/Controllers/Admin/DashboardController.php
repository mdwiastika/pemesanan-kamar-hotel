<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function main()
    {
        $user_count = User::count();
        $room_count = Room::count();
        $booking_count = Booking::count();
        return view('admin.dashboard.main', [
            'title' => 'Dashboard',
            'active' => 'dashboard',
            'user_count' => $user_count,
            'room_count' => $room_count,
            'booking_count' => $booking_count,
        ]);
    }
}
