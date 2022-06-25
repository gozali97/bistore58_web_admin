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
                    <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Add item</button>
                </div>
                <!-- /.card-header -->
                    <!-- /.card-header -->
                    <div class="card-body md-3 table-responsive p-0" style="height: 300px">
                      <table class="table table-striped table-hover ">
                        <thead>
                          <tr style="align-content: center">
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Model</th>
                            <th>Berat</th>
                            <th>Stok</th>
                            <th>Harga</th>
                            {{-- <th>Gambar</th> --}}
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          @php
                            $no = 1;
                          @endphp
                            @foreach($listProduk as $data)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{$data->nama_produk}}</td>
                                <td>{{$data->model}}</td>
                                <td>{{$data->berat}} Kg</td>
                                <td>{{$data->stok}} Pcs</td>
                                <td>{{"Rp. ".number_format($data->harga)}}</td>
                                {{-- <td><img class="rounded-square" width="50" height="50" src="{{ url($data->gambar) }}" alt=""></td> --}}
                                <td>
                                      <a href="{{ route('produk.edit', ['id' => $data->id]) }}" class="btn btn-primary"><i class="fa fa-edit mr-1"></i>Edit</a>
                                      <a href="{{ route('produk.detail', ['id' => $data->id]) }}" class="btn btn-info"><i class="fa fa-edit mr-1"></i>Detail</a>
                                    </td>
                                    <td>
                                      <form action="{{ route('produk.destroy', ['id' => $data->id]) }}" method="post" onsubmit="return confirm('Apa anda yakin ingin menghapus produk ini ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit"><i class="fa fa-trash mr-1"></i>Delete</button>
                                    </form>
                                    </td>
                                    {{-- <a href="#" class="btn btn-danger" data-id="{{$data->id}}" data-toggle="modal" data-target="#delete"><i class="fa fa-trash mr-1"></i>Hapus</a> --}}
                                  
                              </tr>  
                              @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                <!-- /.card-body -->

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
                                      <label>Model</label>
                                      <input type="text" class="form-control" placeholder="Model" name="model">
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Berat</label>
                                      <input type="text" class="form-control" placeholder="Berat" name="berat">
                                    </div>
                                  </div>
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
                                          {{-- <input type="text" class="form-control" id="kategori_id" placeholder="Kategori" name="kategori_id"> --}}
                                          <select class="form-control" name="kategori_id">
                                            @foreach($listKategori as $kat)
                                            <option value="{{$kat->id_kategori}}" >{{$kat->nama_kategori}}</option>
                                          @endforeach
                                          </select>
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

              <!-- Modal delete-->
                {{-- <div class="modal modal-danger fade" id="delete" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title text-center" id="deleteModalLabel">Hapus Produk</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div> --}}
                      {{-- <form method="POST" action="{{ route('produk.destroy', 'test') }}">
                        {{method_field('delete')}} --}}
                      {{-- <form method="POST" action="#"> --}}
                      {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
                      {{-- <div class="modal-body">
                        <input type="hidden" name="id" id="iddata" value="">
                        <p class="text-center">
                          Apa anda yakin ingin menghapus produk ini ?
                        </p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="button" id="btn_delete" class="btn btn-primary">Yes, Delete</button>
                      </div>
                    </div>
                  </div>
                </div> --}}
              
        </div><!--/. container-fluid -->
      </section>
      <!-- /.content -->
@endsection

{{-- @section('js')
      <script>
        $('#delete').on(show.bs.modal, function (event){
          var data = $(event.relatedTarget)
          var iddata = button.data('id')

          var modal = $(this)
          modal.find('.modal-body #iddata').val(iddata)

          $('#btn_delete').click(function (e){
            alert("id"+data.id)
            $.ajax({
              type: 'POST',
              dataType: 'json'
              url: '{{ route('deleteProduct')}}',
              data: {'id': data.id},
              success: function (data){
                console.log(data)
                // location.reload();
              }
            })
          })
        })
      </script>

@endsection --}}
