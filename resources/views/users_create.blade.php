@extends('admin')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-10">
            <h1>User Page</h1>
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
          <form action="{{ route ('users.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label>Username</label>
              <input type="text" name="username" class="form-control" placeholder="...">
              @error('username')
                  <p>{{ $message }}</p>
              @enderror
            </div>
            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="name" class="form-control" placeholder="...">
                @error('name')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="...">
                @error('password')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label>Ulangi Password</label>
                <input type="password" name="password_confirm" class="form-control" placeholder="...">
                @error('password_confirm')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label>Role</label>
                <select name="role" class="form-control">
                    <option value="admin">Admin</option>
                    <option value="owner">Owner</option>
                    <option value="kasir">Kasir</option>
                </select>
            </div>
            <input type="submit" name="submit" class="btn btn-success" value="Tambah">
          </form>
        </div>
      </div>
      <!-- /.card -->

    </section>
      <!-- /.content -->
@endsection