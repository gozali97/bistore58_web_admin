@extends('layouts.admin')

@section('content')
    <!-- general form elements -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Edit Produk</h1>
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
      
      <section class="content">
        <div class="container-fluid">
          <div class="card card-default">
            <div class="card-header">
              {{-- <h3 class="card-title">Select2 (Default Theme)</h3> --}}
  
            </div>
            <!-- /.card-header -->
      <form role="form" method="post" action="{{ route('produk.update', ['id' => $produk->id])  }}" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <input type="hidden" name="id" value="{{ $produk->id }}">
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Nama Produk</label>
                    <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="Masukkan name" value="{{ $produk->nama_produk }}" autofocus required>
                  </div>
                  <!-- /.form-group -->
                  <div class="form-group">
                    <label>model</label>
                    <input type="text" class="form-control" id="model" name="model" placeholder="Masukkan model" value="{{ $produk->model }}" autofocus required>
                  </div>
                  
                  <div class="form-group">
                    <label>Berat</label>
                     <input type="text" class="form-control" id="berat" name="berat" placeholder="Masukkan berat" value="{{ $produk->berat }}" autofocus required>
                  </div>
                  <!-- /.form-group -->
                  <div class="form-group">
                    <label>Kategori</label>
                     <select name="kategori_id" class="form-control">
                          @foreach($kategori as $category)
                              <option value="{{ $category->id_kategori }}" {{ ($produk->kategori_id == $category->id_kategori) ? 'selected' : '' }}>{{ $category->nama_kategori }}</option>
                          @endforeach
                      </select>
                  </div>
                  <div class="form-group">
                    <label>Harga</label>
                    <input type="text" class="form-control" id="harga" name="harga" placeholder="Masukkan harga" value="{{ $produk->harga }}" autofocus required>
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Stok</label>
                     <input type="text" class="form-control" id="stock" name="stock" placeholder="Masukkan stock" value="{{ $produk->stok }}" autofocus required>
                  </div>
                  <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi">{{ $produk->deskripsi }}</textarea>
                  </div>
                    <div class="form-group">
                      <label>Gambar</label>
                      <div class="select2-purple">
                        <input type="file" class="form-control" id="gambar" name="gambar" placeholder="Enter image">
                      </div>
                      <img src="{{ asset('public/storage/') . '/' . $produk->gambar }}" alt="Photo">
                      {{-- <img src="{{ asset('storage/') . '/' . $produk->gambar }}" alt="Photo"> --}}
                    <!-- /.form-group -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              <div class="row">
                <div class="col-12 col-sm-6">
                  <!-- /.form-group -->
                </div>
              </div>
              <!-- /.row -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
              <a href="{{ route('produk.index') }}" class="btn btn-warning">Kembali</a>
            </div>
          </div>
          <!-- /.card -->


@endsection