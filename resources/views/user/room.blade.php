@extends('user.layout.app')
@section('content')
<div class="wpo-breadcumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="wpo-breadcumb-wrap">
                    <h2>Room</h2>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li><span>Room</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end of wpo-breadcumb-section-->
<!-- wpo-room-area-start -->
<div class="wpo-room-area section-bg section-padding">
    <div class="container">
        <div class="room-wrap">
            <div class="row">
                @foreach ($rooms as $room)    
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="room-item">
                            <div class="room-img">
                                <img src="{{ asset('/storage/'.$room->image) }}" alt="">
                            </div>
                            <div class="room-content">
                                <h2><a href="/room/{{ $room->id }}">{{ $room->name }}</a></h2>
                                <ul>
                                    <li><i class="fi flaticon-expand-arrows"></i>{{ $room->size }}</li>
                                    <li><i class="fi flaticon-bed"></i>{{ $room->max_guest }} Person</li>
                                    <li><i class="fi flaticon-bathtub"></i>1 Bathroom</li>
                                </ul>
                                <h3>Rp {{ number_format($room->price, 0, '.', ',') }} <span>/ Night</span></h3>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection