@extends('admin')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Log page</h1>
            </div>
            {{-- <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">Log</li>
                </ol>
            </div> --}}
        </div>
    </div><!-- /.container-fluid -->
    </section>
  
    <!-- Main content -->
    <section class="content">
  
    <!-- Default box -->
    <div class="card elevation-2">
        {{-- <div class="card-header">
        <h3 class="card-title">Log List</h3>
        </div> --}}
        <div class="card-body">

            @if($message = Session::get('success'))
            <div class="alert alert-success">{{ $message }}</div>
            @endif
            <table class="table table-striped table-bordered" id="myTable">
                <thead>
                <tr>
                    <th>Nama User</th>
                    <th>Aktivitas</th>
                    <th>Tanggal</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($logM as $log)
                <tr>
                    <td>{{ $log->name }}</td>
                    <td>{{ $log->activity }}</td>
                    <td>{{ $log->created_at }}</td>
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
