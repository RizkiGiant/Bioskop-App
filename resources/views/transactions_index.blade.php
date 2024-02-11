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
          <form action="{{ route ('transactions.index') }}" method="GET">
          </form>
          @if ($message = Session::get('success'))
          <div class="alert alert-success">{{ $message }}</div>
          @endif
          <a href="{{ route('transactions.create') }}" class="btn btn-success">Tambah Data</i></a>
          <a href="{{ url('transactions/all') }}" class="btn btn-warning">Unduh PDF</a>
          <br><br>
          <table class="table table-bordered" id="myTable">
            <thead class="thead-dark">
              <tr>
                <th>No Unik</th>
                <th>Nama Pelanggan</th>
                <th>Judul Film</th>
                <th>Harga Tiket</th>
                <th>Nama Ruang</th>
                <th>Kursi</th>
                <th>Uang Bayar</th>
                <th>Uang Kembali</th>
                <th>Tanggal</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($transactionsM as $data)
              <tr>
                <td>{{  $data -> nomor_unik  }}</td>
                <td>{{  $data -> nama_pelanggan  }}</td>
                <td>{{  $data -> nama_produk  }}</td>
                <td>{{  $data -> harga_produk  }}</td>
                <td>{{  $data -> nama_ruang  }}</td>
                <td>{{  $data -> kursi  }}</td>
                <td>{{  $data -> uang_bayar  }}</td>
                <td>{{  $data -> uang_kembali  }}</td>
                <td>{{  $data -> created_at  }}</td>
                <td>
                  <a href="{{ route ('transactions.edit', $data->id_trans) }}" class="btn btn-xs btn-warning">
                    <i class="fas fa-pencil-alt"></i>
                  </a>
                  <a href="{{ route ('transactions.pdf', $data->id_trans) }}" class="btn btn-xs btn-success">
                    <i class="fas fa-pencil-alt"></i>
                  </a>
                  <form action="{{ route ('transactions.delete', $data->id_trans) }}" method="POST">
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