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
  
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
            <div class="card">
                    <!-- /.card-header -->
                    <div class="card-header">
                      <h3 class="card-title">Transaksi Menunggu</h3>
                    </div>
                    <div class="card-body md-3">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Total Harga</th>
                            <th>Bank</th>
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
                                <td>{{$data->bank}}</td>
                                <td>{{$data->kode_unik}}</td>
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
                      <h3 class="card-title">Transaksi Selesai</h3>
                    </div>
                    <div class="card-body md-3">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Bank</th>
                            <th>Kode Unik</th>
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
                                <td>{{"Rp. ".number_format($data->total_bayar)}}</td>
                                <td>{{$data->bank}}</td>
                                <td>{{$data->status}}</td>
                                <td>
                                  <div class="d-grid gap-2 d-md-block">
                                    @if($data->status == "Dikirim")
                                    <a href="{{route('transaksiSelesai', $data->id)}}"  class="btn btn-block btn-primary">Selesai</a>
                                    {{-- <a href="#" class="btn btn-danger"><i class="fa fa-trash mr-1"></i>Hapus</a> --}}
                                    @elseif($data->status == "Proses")
                                    <a href="{{route('transaksiKirim', $data->id)}}"  class="btn btn-block btn-success">Kirim</a>
                                    @elseif($data->status == "Selesai" || $data->status == "Batal")
                                    <a href="#"  class="btn btn-block btn-secondary">Detail</a>
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
