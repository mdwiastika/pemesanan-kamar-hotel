@extends('admin.layout.app')
@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>{{ $title }}</h1>
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
        <div class="col-12">
          <!-- /.card -->

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">{{ $title }}</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Tanggal Booking</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($bookings as $key => $booking)    
                    <tr>
                      <td>{{ ($key+1) }}</td>
                      <td>{{ $booking->user->name }}</td>
                      <td>{{ $booking->user->email }}</td>
                      <td>{{ $booking->user->created_at }}</td>
                      <td><a href="/datamaster/bookings/{{ $booking->id }}" class="btn btn-warning btn-sm text-white"><i class="fa fa-eye"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Tanggal Booking</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>    
  @section('script')
  <script>
  </script>
  @endsection
@endsection