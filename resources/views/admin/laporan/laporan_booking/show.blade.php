@php
    use Carbon\Carbon;
@endphp
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
        <div class="col-md-11 m-auto">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">{{ $booking->user->name }}</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
                <div class="card-body">
                    <div class="row">
                      @foreach ($booking->detail_booking as $debbok)
                      <div class="col-12 col-md-6 col-lg-4">
                        <div class="card">
                          <div class="card-body">
                            <h3 class="card-title">{{ $debbok->room->name }}</h3>
                            <p class="card-text">
                              Nomer Resi: {{ $debbok->nomer_resi }}</br>
                              Jumlah Kamar: {{ $debbok->qty }} Kamar</br>
                              Jumlah Hari: {{ Carbon::parse($debbok->check_in)->diffInDays($debbok->check_out) }} Hari</br>
                            </p>
                          </div>
                        </div>
                      </div>
                      @endforeach
                    </div>
                </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <a href="/datamaster/bookings" class="btn btn-primary">Kembali</a>
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
@endsection