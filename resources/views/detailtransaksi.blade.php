@extends('layouts.admin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Details transaksi</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">Details Transaksi</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <!-- /.card-header -->
            <div class="card-header">
              {{-- <h3 class="card-title">Transaksi Menunggu</h3> --}}
            </div>
            <div class="card-body md-3">
            <!-- title row -->
            <!-- info row -->
            <div class="row invoice-info">
                <div class="col-4 invoice-col">
                @foreach($listSelesai as $data)
                <address>
                  <strong>{{$data->nama_penerima}}</strong><br>
                  {{$data->detail_lokasi}}<br>
                  {{$data->no_tlp}}
                </address>
              </div>
              <!-- /.col -->
              <div class="col-4 invoice-col">
                No. Transaksi : <br>
                <b>{{$data->kode_trx}}</b>
                <br>
                
              </div>

              <div class="col-4 invoice-col">
                <b>No. Transaksi:</b> {{$data->order_id}}<br>
                <b>Tanggal Bayar:</b> {{$data->tgl_payment}}<br>
                <b>Akun:</b> {{$data->user->name}}
              </div>
              <!-- /.col -->
            </div>        
            {{-- @endforeach --}}
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
              <div class="col-12 table-responsive">
                <table class="table table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Jumlah Produk</th>
                    <th>Deskripsi</th>
                    <th>Harga Satuan</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php
                    $no = 1;
                  @endphp
                    {{-- @foreach($listSelesai as $data) --}}
                    @foreach($data->details as $detail) 
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{$detail->produk->nama_produk}}</td>
                    <td>{{$detail->total_item}}</td>
                    <td>{{$detail->produk->deskripsi}}</td>
                    <td>{{$detail->produk->harga}}</td>
                  </tr>
                  @endforeach
                  </tbody>
                </table>
                @endforeach
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
            <!-- this row will not appear when printing -->
            <div class="row no-print">
              <div class="col-12">
                <a href="{{route('printtransaksi', $data->id)}}" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                <a href="{{ route('transaksi.index') }}" class="btn btn-primary">Kembali</a>  
            </div>
            </div>
          </div>
        </div>
    </div>
          <!-- /.invoice -->
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>

  @endsection
