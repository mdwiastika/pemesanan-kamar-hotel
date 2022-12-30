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
            <form enctype="multipart/form-data">
               <div class="card-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input disabled type="text" class="form-control" value="{{ $room->name }}" name="name" id="name" value="{{ old('name') }}" placeholder="Masukkan Nama" required>
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <img src="{{ asset('/storage/'.$room->image) }}" class="d-block" width="300" height="200" alt="">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea disabled name="description" id="description" cols="30" rows="10" class="form-control">{{ $room->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="room_available">Room Available</label>
                    <input disabled type="number" class="form-control" value="{{ $room->room_available }}" name="room_available" id="room_available" value="{{ old('room_available') }}" placeholder="Masukkan Room Available" required>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input disabled type="number" class="form-control" value="{{ $room->price }}" name="price" id="price" value="{{ old('price') }}" placeholder="Masukkan Harga" required>
                </div>
                <div class="form-group">
                    <label for="size">Size</label>
                    <input disabled type="text" class="form-control" value="{{ $room->size }}" name="size" id="size" value="{{ old('size') }}" placeholder="Masukkan Ukuran" required>
                </div>
                <div class="form-group">
                    <label for="max_guest">Max Guest</label>
                    <input disabled type="number" class="form-control" value="{{ $room->max_guest }}" name="max_guest" id="max_guest" value="{{ old('max_guest') }}" placeholder="Masukkan Nama" required>
                </div>
               
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <a href="/datamaster/rooms" class="btn btn-primary">Kembali</a>
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