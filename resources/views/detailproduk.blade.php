@extends('layouts.admin')


@section('content')
<section class="content">

    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Detail Produk</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">detail produk</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
    <!-- Default box -->
    <div class="card card-solid">
      <div class="card-body">
        <div class="row">
          <div class="col-12 col-sm-6">
            <h3 class="d-inline-block d-sm-none">{{ $produk->nama_produk }}</h3>
            <div class="col-12">
              <img class="product-image" src="{{ asset('public/storage/') . '/' . $produk->gambar }}" alt="Photo">
              {{-- <img class="product-image" src="{{ asset('storage/') . '/' . $produk->gambar }}" alt="Photo"> --}}
            </div>
          </div>
          <div class="col-12 col-sm-6">
            <h3 class="my-3">{{ $produk->nama_produk }}</h3>
            <p>{{ $produk->deskripsi }}</p>

            <hr>
            <h4>Stock : {{ $produk->stok }}</h4>

            <div class="bg-gray py-2 px-3 mt-4">
              <h2 class="mb-0">
                {{ "Rp. ".number_format($produk->harga) }}
              </h2>
            </div>

            <div class="mt-4">
                <a href="{{ route('produk.index') }}" class="btn btn-primary">Kembali</a>

            </div>
          </div>
        </div>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->


 @endsection
