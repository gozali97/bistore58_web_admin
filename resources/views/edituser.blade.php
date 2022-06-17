@extends('layouts.admin')

@section('content')
    <!-- general form elements -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Edit User</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">edit user</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>

<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              {{-- <h3 class="card-title text-center">Edit User</h3> --}}
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{ route('user.update', ['id' => $user->id])  }}" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Lengkap</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama" value="{{ $user->name }}" autofocus required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Alamat Email</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email" value="{{ $user->email }}" autofocus required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">No Handphone</label>
                  <input type="number" class="form-control" id="phone" name="phone" placeholder="Masukkan no handphone" value="{{ $user->phone }}" autofocus required>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
                {{-- <div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="exampleInputFile">
                      <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                    <div class="input-group-append">
                      <span class="input-group-text">Upload</span>
                    </div>
                  </div>
                </div> --}}
                {{-- <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div> --}}
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-success">Submit</button>
                <a href="{{ route('user.index') }}" class="btn btn-warning">Kembali</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</section>
@endsection