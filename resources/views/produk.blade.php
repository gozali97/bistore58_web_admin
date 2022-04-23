@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Table Produk</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">produk</li>
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
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
                        <button type="button" class="btn btn-tool" data-dismiss="modal" aria-label="Close">
                            <i class="fas fa-times"></i>
                          </button>
                        </div>
                        <div class="modal-body">    
                            <form method="POST" action="{{ route('produk.store') }}" role="form" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                  <div class="form-group">
                                    <label>Nama Produk</label>
                                    <input type="text" class="form-control" id="nama_produk" placeholder="nama" name="nama_produk">
                                  </div>
                                  <div class="row">
                                    <div class="col-sm-6">
                                      <div class="form-group">
                                        <label>Harga</label>
                                        <input type="text" class="form-control" placeholder="harga" name="harga">
                                      </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Kategori</label>
                                            <input type="text" class="form-control" id="kategori_id" placeholder="Kategori" name="kategori_id">
                                            {{-- <select class="form-control" name="kategori_id">
                                              @foreach($listKategori as $kat)
                                              <option value="id_kategori" >{{$kat->id_kategori}}</option>
                                            @endforeach
                                            </select> --}}
                                          </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label>Deskripsi</label>
                                    <textarea class="form-control" rows="3" placeholder="Deskripsi" name="deskripsi"></textarea>
                                  </div>
                                  <div class="form-group">
                                    <label>Stok</label>
                                    <input type="text" class="form-control" id="stok" placeholder="Stok" name="stok">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputFile">Gambar</label>
                                    <div class="input-group">
                                      <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="exampleInputFile" name="gambar">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                      </div>
                                    </div>
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
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>stok</th>
                            <th style="width: 200px">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($listUser as $data)
                            <tr>
                                <td>{{$data->id}}</td>
                                <td>{{$data->nama_produk}}</td>
                                <td>{{"Rp. ".number_format($data->harga)}}</td>
                                <td>{{$data->Stok}} Pcs</td>
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
