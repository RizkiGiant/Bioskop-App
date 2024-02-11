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
          <form action="{{ route ('transactions.update', $transactions->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label>Nomor Unik</label>
              <input type="number" name="nomor_unik" class="form-control" placeholder="..." value="{{ $transactions->nomor_unik }}" readonly>
              @error('nomor_unik')
                  <p>{{ $message }}</p>
              @enderror
          </div>
            <div class="form-group">
                <label>Nama Pelanggan</label>
                <input type="text" name="nama_pelanggan" class="form-control" placeholder="..."value="{{ $transactions->nama_pelanggan }}">
                @error('nama_pelanggan')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div class ="form-group">
                <label>Nama Produk + Harga</label>
                <select name="id_produk" type="text" class="form-control" placeholder="...">
                    <option value="">- pilih produk -</option>
                    @foreach ($productsM as $data)
                    <?php
                    if ($data->id == $transactions->id_produk):
                        $selected = "selected";
                    else:
                        $selected = "";
                    endif;
                    ?>
                        <option {{ $selected }} value="{{ $data->id }}">
                            {{ $data->nama_produk}} - {{ $data->harga_produk}}
                        </option>
                    @endforeach
                </select>
                @error('id_produk')
                 <p>{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label>Uang Bayar</label>
                <input type="number" name="uang_bayar" class="form-control" placeholder="..."value="{{ $transactions->uang_bayar }}">
                @error('uang_bayar')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            {{-- <div class="form-group">
                <label>Harga Produk</label>
                <input type="number" name="harga_produk" class="form-control" placeholder="..." value="{{ $data->harga_produk }}">
                @error('harga_produk')
                    <p>{{ $message }}</p>
                @enderror
            </div> --}}
            <input type="submit" name="submit" class="btn btn-success" value="Simpan">
          </form>
        </div>
      </div>
      <!-- /.card -->

    </section>
      <!-- /.content -->
@endsection