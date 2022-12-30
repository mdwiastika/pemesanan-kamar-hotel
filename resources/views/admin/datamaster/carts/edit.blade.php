@extends('admin.layout.app')
@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">{{ $title }}</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-10 m-auto">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">{{ $title }}</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="/datamaster/carts/{{ $cart->id }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="card-body">
                  <div class="form-group">
                      <label for="user_id">Username</label>
                     <select name="user_id" class="form-control" id="user_id">
                       <option value="">-- Select User --</option>
                      @foreach ($users as $user)
                      <option value="{{ $user->id }}" {{ $cart->user->id == $user->id ? 'selected' : ''}}>{{ $user->name }}</option>
                      @endforeach
                     </select>
                  </div>
                  <div class="form-group">
                      <label for="room_id">Room Name</label>
                      <select name="room_id" id="room_id" class="form-control">
                        <option value="">-- Select Room --</option>
                        @foreach ($rooms as $room)
                        <option value="{{ $room->id }}" {{ $cart->room->id == $room->id ? 'selected' : '' }}>{{ $room->name }}</option>
                        @endforeach
                      </select>
                    </div>
                  <div class="form-group">
                      <label for="qty">QTY</label>
                      <input value="{{ $cart->qty }}" type="text" class="form-control" name="qty" id="qty" min="1"  placeholder="Qty" required>
                  </div>
                  <div class="form-group">
                      <label for="check_in">Check-in</label>
                      <input type="datetime" value="{{ $cart->check_in }}" class="form-control" name="check_in" id="check_in" placeholder="Check-in" required>
                  </div>
                  <div class="form-group">
                      <label for="check_out">Check-out</label>
                      <input type="datetime" value="{{ $cart->check_out }}" class="form-control" name="check_out" id="check_out" placeholder="Check-out" required>
                  </div>
                </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <a href="/datamaster/users" class="btn btn-primary">Kembali</a>
                <button type="submit" class="btn btn-success">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.card -->

        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  @section('script')
  @endsection
@endsection