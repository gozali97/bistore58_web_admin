@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Table Transaksi</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Transaksi</li>
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
                    <!-- /.card-header -->
                    <div class="card-header">
                      <h3 class="card-title">Transaksi Menunggu</h3>
                    </div>
                    <div class="card-body md-3 table-responsive p-0" style="height: 300px">
                      <table class="table table-head-fixed table-bordered">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama</th>                       
                            <th>Produk</th>
                            <th>Bank</th> 
                            <th>Total Harga</th>
                            <th>Status</th>
                            <th style="width: 200px">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          @php
                          $no = 1;
                          @endphp
                            @foreach($listPending as $data)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{$data->nama_penerima}}</td>
                                <td>
                                  <ul>
                                  @foreach($data->details as $detail)
                                    <li>{{ $detail->produk->nama_produk }}</li>
                                  @endforeach
                                  </ul>
                                  </td>
                                <td>{{$data->bank}}</td>
                                <td>{{"Rp. ".number_format($data->total_bayar)}}</td>
                                <td>{{$data->status}}</td>
                                <td>
                                  <div class="d-grid gap-2 d-md-block">
                                    <a href="{{route('transaksiConfirm', $data->id)}}" class="btn btn-primary"></i>Prosess</a>
                                    <a href="{{route('transaksiBatal', $data->id)}}" class="btn btn-danger"></i>Batal</a>
                                  </div>
                                </td>
                              </tr>  
                              @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>

                  <div class="card">
                    <!-- /.card-header -->
                    <div class="card-header">
                      <h3 class="card-title">Transaksi Diproses</h3>
                           {{-- @foreach($listSelesai as $data) --}}
                          {{-- <a class="float-right" href="{{route('allTransaksi')}}" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a> --}}
                          
                    </div>
                    <div class="card-body md-3 table-responsive p-0" style="height: 300px">
                      <table class="table table-bordered table-head-fixed">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Produk</th>
                            <th>Bank</th>
                            <th>Total Harga</th>
                            <th>Status</th>
                            <th style="width: 200px">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          @php
                            $no = 1;
                          @endphp
                            @foreach($listSelesai as $data)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{$data->nama_penerima}}</td>
                                <td>
                                  <ul>
                                  @foreach($data->details as $detail)
                                    <li>{{ $detail->produk->nama_produk }} ({{ $detail->total_item}} Pcs)</li>
                                  @endforeach
                                  </ul>
                                  </td>
                                <td>{{$data->bank}}</td>
                                <td>{{"Rp. ".number_format($data->total_bayar)}}</td>
                                <td>{{$data->status}}</td>
                                <td>
                                  <div class="d-grid gap-2 d-md-block">
                                    @if($data->status == "Dikirim")
                                    <a href="{{route('transaksiSelesai', $data->id)}}"  class="btn btn-block btn-primary">Selesai</a>
                                    <a href="{{route('transaksiDetails', $data->order_id)}}"  class="btn btn-block btn-secondary">Detail</a>
                                    @elseif($data->status == "Pembayaran Dikonfirmasi")
                                    <a href="{{route('transaksiPacking', $data->id)}}"  class="btn btn-block btn-warning">Packing</a>
                                    <a href="{{route('transaksiDetails', $data->order_id)}}"  class="btn btn-block btn-secondary">Detail</a>
                                    @elseif($data->status == "Packing")
                                    <a href="{{route('transaksiKirim', $data->id)}}"  class="btn btn-block btn-success">Dikirim</a>
                                    <a href="{{route('transaksiDetails', $data->order_id)}}"  class="btn btn-block btn-secondary">Detail</a>
                                    @elseif($data->status == "Selesai")
                                    <a href="{{route('transaksiDetails', $data->order_id)}}"  class="btn btn-block btn-secondary">Detail</a>
                                    @else
                                    <form action="{{ route('transaksi.destroy', ['id' => $data->id]) }}" method="post" onsubmit="return confirm('Apa anda yakin ingin menghapus transaksi ini ?')">
                                      @csrf
                                      @method('DELETE')
                                      <button class="btn btn-block btn-danger mt-2" type="submit"><i class="fa fa-trash mr-1"></i>Delete</button>
                                  </form>
                                    @endif
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
