<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bali Indah Kamera | Print</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
</head>
<body>
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-12">
        <h1 class="text-center">Invoice</h1>
        <h2 class="page-header">
          <img src="{{ asset('dist/img/baliindah.png') }}" width="30" height="30"> Bali Indah Photo
          <small class="float-right">Tanggal: {{ date('d-m-Y') }}</small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info mt-2">
        <div class="col-4 invoice-col">
        @foreach($listSelesai as $data)
        Nama Penerima:<br>
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
              <td>{{"Rp. ".number_format($detail->produk->harga)}}</td>
            </tr>
            @endforeach
            </tbody>
          </table>
    @endforeach
        </div>
        <!-- /.col -->
      </div>
    <!-- /.row -->
    <div class="row">
      <!-- accepted payments column -->
      @foreach($listSelesai as $data)
      <div class="col-6">
        {{-- <p class="lead">Pembayaran :</p>

        <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
          Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg dopplr
          jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
        </p> --}}
      </div>
      <!-- /.col -->
      <div class="col-6">
        <p class="lead">Tanggal Tansaksi {{$data->created_at}}</p>

        <div class="table-responsive">
          <table class="table">
            <tr>
              <th style="width:50%">Subtotal:</th>
              <td>{{"Rp. ".number_format($data->total_harga)}}</td>
            </tr>
            <tr>
              <th>Jasa Ongkir:</th>
              <td>{{"Rp. ".number_format($data->ongkir)}}</td>
            </tr>
            <tr>
              <th>Total Bayar:</th>
              <td>{{"Rp. ".number_format($data->total_bayar)}}</td>
            </tr>
          </table>
          @endforeach
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
<!-- Page specific script -->
<script>
  window.addEventListener("load", window.print());
</script>
</body>
</html>
