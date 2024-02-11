@extends('admin')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-10">
            <h1>Transactions Page</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
  
      <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-body">
        <a href="{{ route ('transactions.index') }}" class="btn btn-default">Kembali</a>
        <br><br>
          <form action="{{ route ('transactions.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label>Nomor Unik</label>
              <input type="number" name="nomor_unik" class="form-control" placeholder="..." value="{{ random_int(1000000000, 9999999999); }}" readonly>
              @error('nomor_unik')
                  <p>{{ $message }}</p>
              @enderror
            </div>
            <div class="form-group">
                <label>Nama Pelanggan</label>
                <input type="text" name="nama_pelanggan" class="form-control" placeholder="...">
                @error('nama_pelanggan')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label>Nama + Harga</label>
                <select name="id_produk" type="text" class="form-control" placeholder="...">
                    <option value="">Pilih</option>
                    @foreach ($productsM as $data)
                        <option value="{{ $data->id }}">
                        {{ $data->nama_produk}} + {{ $data->harga_produk}}
                        </option>
                    @endforeach
                </select>
                @error('id_produk')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label>Ruang & Kursi</label>
                <select name="id_ruang" type="text" class="form-control" placeholder="...">
                    <option value="">Pilih</option>
                    @foreach ($ruangM as $data)
                        <option value="{{ $data->id }}">
                        {{ $data->nama}} + {{ $data->jumlah_kursi}}
                        </option>
                    @endforeach
                </select>
                @error('id_ruang')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label>Uang Bayar</label>
                <input type="number" name="uang_bayar" class="form-control" placeholder="...">
                @error('uang_bayar')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <input type="submit" name="submit" class="btn btn-success" value="Tambah">
          </form>
        </div>
      </div>
      <!-- /.card -->

    </section>
      <!-- /.content -->
@endsection