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

      
      <div class="box-header with-border">
        @if(session('status'))
            <div class="alert alert-danger alert-dismissible">
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
                          @php
                            $no = 1;
                          @endphp
                            @foreach($listKategori as $data)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{$data->nama_kategori}}</td>
                                {{-- <td>{{$data->created_at}}</td>
                                <td>{{$data->updated_at}}</td> --}}
                                <td>
                                  <div class="d-grid gap-2 d-md-block">
                                    <form action="{{ route('kategori.destroy', ['id' => $data->id_kategori]) }}" method="post" onsubmit="return confirm('Apa anda yakin ingin menghapus kategori ini ?')">
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
                  </div>
                <!-- /.card-body -->
              
        </div><!--/. container-fluid -->
      </section>
      <!-- /.content -->
@endsection
