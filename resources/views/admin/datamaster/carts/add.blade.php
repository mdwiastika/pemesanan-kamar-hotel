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
            <form action="/datamaster/carts" method="POST" enctype="multipart/form-data">
                @csrf
              <div class="card-body">
                <div class="form-group">
                    <label for="user_id">Username</label>
                   <select name="user_id" class="form-control" id="user_id">
                     <option value="">-- Select User --</option>
                    @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                   </select>
                </div>
                <div class="form-group">
                    <label for="room_id">Room Name</label>
                    <select name="room_id" id="room_id" class="form-control">
                      <option value="">-- Select Room --</option>
                      @foreach ($rooms as $room)
                      <option value="{{ $room->id }}">{{ $room->name }}</option>
                      @endforeach
                    </select>
                  </div>
                <div class="form-group">
                    <label for="qty">QTY</label>
                    <input type="text" class="form-control" name="qty" id="qty" min="1" max="" value="{{ old('qty') }}" placeholder="Qty" required>
                </div>
                <div class="form-group">
                    <label for="check_in">Check-in</label>
                    <input type="date" class="form-control" name="check_in" id="check_in" value="{{ old('check_in') }}" placeholder="Check-in" required>
                </div>
                <div class="form-group">
                    <label for="check_out">Check-out</label>
                    <input type="date" class="form-control" name="check_out" id="check_out" value="{{ old('check_out') }}" placeholder="Check-out" required>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <a href="/datamaster/carts" class="btn btn-primary">Kembali</a>
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
  <script>
    const current_date = new Date();
    const date = current_date.getDate();
    const month = current_date.getMonth();
    const year = current_date.getFullYear();
    const input_checkin = document.querySelector('[name="check_in"]');
    const input_checkout = document.querySelector('[name="check_out"]');
    input_checkin.min = `${year}-${month+1}-${date}`;
    input_checkout.min = `${year}-${month+1}-${date}`;
  </script>
  @section('script')
  @endsection
@endsection