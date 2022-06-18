@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Laporan Transaksi</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Laporan</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>

      <section class="content">
        <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="table-responsive">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Alamat</th>
              <th>Produk</th>
              <th>Pembayaran</th>
              <th>Total Harga</th>
              <th>Status</th>
            </tr>
            </thead>
            <tbody>
                @php
              $no = 1;
            @endphp
              @foreach($laporan as $data)
            <tr>
              <td>{{$no++}}</td>
              <td>{{$data->nama_penerima}}</td>
              <td>{{$data->detail_lokasi}}</td>
              <td><ul>
                @foreach($data->details as $detail)
                  <li>{{ $detail->produk->nama_produk}} ({{ $detail->total_item}} Pcs)</li>
                @endforeach
                </ul></td>
              <td>{{strtoupper($data->bank)}}</td>
              <td>{{"Rp. ".number_format($data->total_harga)}}</td>
              <td>{{$data->status}}</td>
            </tr>
            @endforeach
            </tbody>
          </table>
        </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
        </div>
      </section>


@endsection