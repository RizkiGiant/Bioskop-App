@extends('admin')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-10">
            <h1>Products Page</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
  
      <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-body">
          @if ($message = Session::get('success'))
          <div class="alert alert-success">{{ $message }}</div>
          @endif
          <a href="{{ route('products.create') }}" class="btn btn-success">Tambah Data</i></a>
          <br><br>
          <table class="table table-bordered" id="myTable">
            <thead class="thead-dark">
              <tr>
                <th>Gambar/Poster</th>
                <th>Nama Film</th>
                <th>Durasi</th>
                <th>Harga Tiket</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($productsM as $data)
              <tr>
                <td>
                  @if ($data->image)
                      <a href="{{ asset('asset/images/' . $data->image) }}" target="_blank">
                          <img src="{{ asset('asset/images/' . $data->image) }}" alt="products" width="100">
                      </a>
                  @else
                      No Image
                  @endif
                </td>
                <td>{{ $data -> nama_produk }}</td>
                <td>{{ $data -> durasi }}</td>
                <td>{{ $data -> harga_produk }}</td>
                <td>
                  <a href="{{ route ('products.edit', $data->id) }}" class="btn btn-xs btn-warning">
                    <i class="fas fa-pencil-alt"></i>
                  </a>
                  <form action="{{ route('products.destroy', $data->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-xs btn-danger" onclick="return confirm('Konfirmasi Hapus Data??')">
                      <i class="fas fa-trash-alt"></i></button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <!-- /.card -->

    </section>
      <!-- /.content -->
@endsection