<?php

use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\CartController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController as ControllersBookingController;
use App\Http\Controllers\CartController as ControllersCartController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\RoomController as ControllersRoomController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/homepage');
});
Route::group(['middleware' => 'guest'], function () {
    Route::get('/', function () {
        return redirect('/login');
    });
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'postLogin']);
    Route::post('/register', [AuthController::class, 'postRegister']);
});
Route::group(['middleware' => 'auth'], function () {

    // tampilan untuk admin
    Route::group(['middleware' => 'is_admin'], function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'main'])->name('/home');
        Route::prefix('/datamaster')->group(function () {
            Route::resource('/users', UserController::class);
            Route::resource('/rooms', RoomController::class);
            Route::resource('/carts', CartController::class);
            Route::resource('/bookings', BookingController::class);
            Route::get('/test-detail', function () {
                return view('admin.laporan.laporan_booking.show', [
                    'title' => 'Table Cart',
                    'active' => 'datamaster',
                ]);
            });
        });
    });

    //tampilan untuk user 
    Route::group(['middleware' => 'is_user'], function () {
        Route::resource('/homepage', HomepageController::class);
        Route::resource('/room', ControllersRoomController::class);
        Route::resource('/cart', ControllersCartController::class);
        Route::get('/contact', function () {
            return view('user.contact');
        });
        Route::resource('/booking', ControllersBookingController::class);
        Route::post('/change-qty/{id}', [ControllersCartController::class, 'changeQty']);
        Route::get('/history', [HistoryController::class, 'main']);
    });
    Route::post('/logout', [AuthController::class, 'logout']);
});
