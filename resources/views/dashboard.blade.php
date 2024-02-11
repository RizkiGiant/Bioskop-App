@extends('admin')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          {{-- <div class="row mb-2"> --}}
            {{-- <div class="col-sm-10" style="text-align: center"> --}}
              <marquee behavior="scroll" direction="left">
                  <h1>Hi, {{ Auth::user()->name }} Selamat Datang Di Aplikasi Sistem Bioskop Kami Semoga Hari Mu Menyenangkan :) </h1>
              </marquee>
          {{-- </div> --}}
          {{-- </div> --}}
        </div><!-- /.container-fluid -->
      </section>
      {{-- <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                  <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-box"></i></span>
      
                    <div class="info-box-content">
                      <span class="info-box-text">Products</span>
                      <span class="info-box-number">
                        10
                        <small> items</small>
                      </span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                  <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-book"></i></span>
      
                    <div class="info-box-content">
                      <span class="info-box-text">Transactions</span>
                      <span class="info-box-number">
                        50
                        <small> tr</small>
                      </span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
      
                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>
      
                <div class="col-12 col-sm-6 col-md-3">
                  <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-money-bill"></i></span>
      
                    <div class="info-box-content">
                      <span class="info-box-text">Income</span>
                      <span class="info-box-number">
                        500.000
                        <small> rupiah</small>
                      </span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                  <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
      
                    <div class="info-box-content">
                      <span class="info-box-text">Members</span>
                      <span class="info-box-number">
                        5
                        <small> person</small>
                      </span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
              </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </div> --}}
@endsection