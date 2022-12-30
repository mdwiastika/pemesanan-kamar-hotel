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
                        <h2>{{ $room->name }}</h2>
                        <ul>
                            <li><a href="/homepage">Home</a></li>
                            <li><span>Room</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end of wpo-breadcumb-section-->
    <!-- wpo-hotel-details-section-start -->
    <div class="wpo-hotel-details-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="wpo-hotel-details-wrap">
                        <div class="wpo-hotel-details-area">
                            <form class="clearfix">
                                <div class="details-sub">
                                    <span>BEDS</span>
                                    <h2>1 Double Bed</h2>
                                </div>
                                <div class="details-sub">
                                    <span>ROOM SIZE</span>
                                    <h2>{{ $room->size }}</h2>
                                </div>
                                <div class="details-sub">
                                    <span>OCCUPANCY</span>
                                    <h2>{{ $room->max_guest }} Person</h2>
                                </div>
                                <div class="details-sub">
                                    <span>Bathroom</span>
                                    <h2>Shower bath</h2>
                                </div>
                                <div class="details-sub">
                                    <h5><span>Rp {{ number_format($room->price, 0, '.', ',') }}</span> / Night</h5>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- wpo-hotel-details-section-end -->
    <!-- wpo-room-area-start -->
    <div class="wpo-room-area-s2 section-padding pt-0">
        <div class="container-fluid">
            <div class="room-wrap room-active owl-carousel">
                <div class="room-item" style="display: grid; grid-template-columns: 1fr">
                    <div class="room-img">
                        <img src="{{ asset('/storage/'.$room->image) }}" alt="">
                    </div>
                    <div class="room-content">
                        <h2>{{ $room->name }}</h2>
                        <ul>
                            <li><i class="fi flaticon-expand-arrows"></i>{{ $room->size }}</li>
                            <li><i class="fi flaticon-bed"></i>1 Bed</li>
                            <li><i class="fi flaticon-bathtub"></i>1 Bathroom</li>
                        </ul>
                        <h3>Rp {{ number_format($room->price) }} <span>/ Night</span></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .room-area-start -->
    <!--Start Room-details area-->
    <div class="Room-details-area pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12">
                    <div class="room-description">
                        <div class="room-title">
                            <h2>Description</h2>
                        </div>
                        <p class="p-wrap">{{ $room->description }}</p>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="blog-sidebar room-sidebar">
                        <div class="widget check-widget">
                            <h3>Check Availability</h3>
                            <form method="POST" action="/cart">
                                @csrf
                                <!-- Datepicker as text field -->
                                <div class="input-group date">
                                    <input required autocomplete="off" type="datetime" name="check_in" id="datepicker" placeholder="Check in">
                                    <i class="fi flaticon-calendar"></i>
                                </div>

                                <!-- Datepicker as text field -->
                                <div class="input-group date">
                                    <input required autocomplete="off" type="datetime" name="check_out" id="datepicker2" placeholder="Check Out">
                                    <input type="hidden" name="room_id" value="{{ $room->id }}">
                                    <i class="fi flaticon-calendar"></i>
                                </div>
                                <div class="input-group date">
                                    <button class="theme-btn" type="submit">Add to Chart</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End Room-details area-->
@endsection