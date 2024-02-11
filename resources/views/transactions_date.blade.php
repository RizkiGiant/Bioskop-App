@extends('admin')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h2>Cetak Pertanggal</h2>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="card">
    <div class="card-header">
      {{-- <h3 class="card-title">Prin Pertanggal</h3> --}}
      <br>
      {{-- <form action="{{ route('transactions.pertanggal') }}" method="GET">
         --}}
         <form action="{{ route('transactions.pertanggal', ['tgl_awal' => '2024-01-01', 'tgl_akhir' => '2024-12-31']) }}" method="GET">
          <div class="form-group">
              <label>Tanggal Awal</label>
              <input name="tgl_awal" type="date" class="form-control" style="border: 1px solid rgb(88, 88, 88);">
              @error('tgl_awal')
              <p>{{ $message }}</p>
              @enderror
          </div>
          <div class="form-group">
              <label>Tanggal Akhir</label>
              <input name="tgl_akhir" type="date" class="form-control" style="border: 1px solid rgb(88, 88, 88);">
              @error('tgl_akhir')
              <p>{{ $message }}</p>
              @enderror
          </div>
          <h6>*Tanggal Akhir tidak masuk data</h6>
          <a href="{{ route('transactions.index') }}" class="btn btn-warning">Kembali</a>
          <button type="submit" class="btn btn-success">Tampilkan Data</button>
        </form>
         {{-- </form>     --}}
    <!-- /.card-body -->
    <!-- /.card-footer-->
  <!-- /.card -->

</section>
<!-- /.content -->
@endsection