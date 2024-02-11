@extends('admin')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-10">
            <h1>Users Page</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
  
      <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-body">
          <form action="{{ route ('users.index') }}" method="GET">
          </form>
          @if ($message = Session::get('success'))
          <div class="alert alert-success">{{ $message }}</div>
          @endif
          <a href="{{ route('users.create') }}" class="btn btn-success">Tambah Data</i></a>
          <br><br>
          <table class="table table-bordered">
            <thead class="thead-dark">
              <tr>
                <th>Username</th>
                <th>Nama Lengkap</th>
                <th>Role</th>
                <th>Aksi</th>
              </tr>
              @foreach ($usersM as $data)
              <tr>
                <td>{{  $data -> username  }}</td>
                <td>{{  $data -> name  }}</td>
                <td>{{  $data -> role  }}</td>
                <td>
                  <a href="{{ route ('users.edit', $data->id) }}" class="btn btn-xs btn-warning">
                    <i class="fas fa-pencil-alt"></i>
                  </a>
                  
                  <form action="{{ route ('users.delete', $data->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-xs btn-danger" onclick="return confirm('Konfirmasi Hapus Data??')">
                      <i class="fas fa-trash-alt"></i></button>
                  </form>
                  <a href="{{route('users.changepassword', $data->id)}}" class="btn btn-xs btn-success"><i class="fas fa-key"></i></a>
                </td>
              </tr>
              @endforeach
            </thead>
          </table>
        </div>
      </div>
      <!-- /.card -->

    </section>
      <!-- /.content -->
@endsection