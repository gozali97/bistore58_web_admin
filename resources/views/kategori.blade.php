@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Table Kategori</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Kategori</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
  
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
            <div class="card">

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                        <button type="button" class="btn btn-tool" data-dismiss="modal" aria-label="Close">
                            <i class="fas fa-times"></i>
                          </button>
                        </div>
                        <div class="modal-body">    
                            <form method="POST" action="{{ route('kategori.store') }}" role="form" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                  <div class="form-group">
                                    <label>Nama Kategori</label>
                                    <input type="text" class="form-control" id="nama_kategori" placeholder="nama kategori" name="nama_kategori">
                                  </div>
                                </div>
                                <!-- /.card-body -->
                
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                </div>
                              </form>
                        </div>
                    </div>
                    </div>
                </div>

                <div class="card-header">
                    <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Add item</button>
                </div>
                <!-- /.card-header -->
                    <!-- /.card-header -->
                    <div class="card-body md-3">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            {{-- <th>Create at</th>
                            <th>Update At</th> --}}
                            <th style="width: 200px">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($listKategori as $data)
                            <tr>
                                <td>{{$data->id_kategori}}</td>
                                <td>{{$data->nama_kategori}}</td>
                                {{-- <td>{{$data->created_at}}</td>
                                <td>{{$data->updated_at}}</td> --}}
                                <td>
                                  <div class="d-grid gap-2 d-md-block">
                                    <a href="#" class="btn btn-primary"><i class="fa fa-edit mr-1"></i>Edit</a>
                                    <a href="#" class="btn btn-danger"><i class="fa fa-trash mr-1"></i>Hapus</a>
                                  </div>
                                </td>
                              </tr>  
                              @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                <!-- /.card-body -->
              
        </div><!--/. container-fluid -->
      </section>
      <!-- /.content -->
@endsection
