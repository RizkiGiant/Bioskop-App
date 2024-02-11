@extends('admin')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-10">
            <h1>Ruang Page</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
  
      <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-body">
        <a href="{{ route ('ruang.index') }}" class="btn btn-default">Kembali</a>
        <br><br>
          <form action="{{ route ('ruang.update', $data->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Nama Ruangan</label>
                <input type="text" name="nama" class="form-control" placeholder="..."value="{{ $data->nama }}">
                @error('nama')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label>Jumlah Kursi</label>
                <input type="number" name="jumlah_kursi" class="form-control" placeholder="..." value="{{ $data->jumlah_kursi }}">
                @error('jumlah_kursi')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <input type="submit" name="submit" class="btn btn-success" value="Simpan">
          </form>
        </div>
      </div>
      <!-- /.card -->

    </section>
      <!-- /.content -->
@endsection