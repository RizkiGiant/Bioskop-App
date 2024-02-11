@extends('admin')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-10">
            <h1>User Change Password</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
  
      <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-body">
        <a href="{{ route ('users.index') }}" class="btn btn-default">Kembali</a>
        <br><br>
          <form action="{{ route ('users.change', $data->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
              <label>Username</label>
              <input type="text" name="username" class="form-control" placeholder="..." value="{{$data->username}}" readonly>
              @error('username')
                  <p>{{ $message }}</p>
              @enderror
            </div>
            <div class="form-group">
                <label>Password Baru</label>
                <input type="password" name="password_new" class="form-control" placeholder="...">
                @error('password_new')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label>Ulangi Password Baru</label>
                <input type="password" name="password_confirm" class="form-control" placeholder="...">
                @error('password_confirm')
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