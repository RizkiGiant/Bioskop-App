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
        <a href="{{ route ('users.index') }}" class="btn btn-default">Kembali</a>
        <br><br>
          <form action="{{ route ('users.update', $users->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label>Username</label>
              <input type="text" name="username" class="form-control" placeholder="..." value="{{ $users->username }}">
              @error('username')
                  <p>{{ $message }}</p>
              @enderror
          </div>
            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="name" class="form-control" placeholder="..." value="{{ $users->name }}">
                @error('name')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label>Role</label>
                <input type="text" name="role" class="form-control" value="{{ $users->role }}" readonly>
                @error('role')
                <p>{{ $message }}</p>
                @enderror
            </div>
            {{-- <div class="form-group">
                <label>Role</label>
                <select name="role" class="form-control" value="{{ $users->role }}" readonly>
                    <option>- Pilih Role</option>
                    <option value="admin">Admin</option>
                    <option value="owner">Owner</option>
                    <option value="kasir">Kasir</option>
                </select>
                @error('role')
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