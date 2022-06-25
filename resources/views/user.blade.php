@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Table User</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">User</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
      <div class="box-header with-border">
        @if(session('status'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-check"></i> Success! &nbsp;
                {{ session('status') }}
            </div>
        @endif
      </div>
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0" style="height: 300px">
                  <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No Telepon</th>
                        <th>Status</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php
                      $no = 1;
                    @endphp
                        @foreach($listUser as $data)
                      <tr>
                        <td>{{$no++}}</td>
                        <td>{{$data->name}}</td>
                        <td>{{$data->email}}</td>
                        <td>{{$data->phone}}</td>
                        <td>{{$data->role}}</td>
                        <td>
                            <a href="{{ route('user.edit', ['id' => $data->id]) }}" class="btn btn-primary"><i class="fa fa-edit mr-1"></i>Edit</a>
                        </td>
                        <td>
                             <form action="{{ route('user.destroy', ['id' => $data->id]) }}" method="post" onsubmit="return confirm('Apa anda yakin ingin menghapus user ini ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit"><i class="fa fa-trash mr-1"></i>Delete</button>
                                    </form>
                          </div>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
        </div><!--/. container-fluid -->
      </section>
      <!-- /.content -->
@endsection
