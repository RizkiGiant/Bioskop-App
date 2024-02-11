@extends('admin')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-10">
            <h1>Room Page</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
  
      <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-body">
          <form action="{{ route ('ruang.index') }}" method="GET">
          </form>
          @if ($message = Session::get('success'))
          <div class="alert alert-success">{{ $message }}</div>
          @endif
          <a href="{{ route('ruang.create') }}" class="btn btn-success">Tambah Data</i></a>
          <br><br/>
          {{-- <a href="{{ url('products/pdf') }}" class="btn btn-warning">Unduh PDF</a> --}}
          <table class="table table-bordered" id="myTable">
            <thead class="thead-dark">
              <tr>
                <th>Nama Ruangan</th>
                <th>Jumlah Kursi</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($ruangM as $data)
              <tr>
                <td>{{ $data -> nama }}</td>
                <td>{{ $data -> jumlah_kursi }}</td>
                <td>
                  <a href="{{ route ('ruang.edit', $data->id) }}" class="btn btn-xs btn-warning">
                    <i class="fas fa-pencil-alt"></i>
                  </a>
                  <form action="{{ route('ruang.delete', $data->id) }}" method="POST">
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