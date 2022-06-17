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
    <div class="card-body md-3">
        <table class="table table-bordered">
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
                      <li>{{ $detail->produk->nama_produk }}</li>
                    @endforeach
                    </ul>
                    </td>
                  <td>{{$data->bank}}</td>
                  <td>{{"Rp. ".number_format($data->total_bayar)}}</td>
              </tr>
          </tbody>
        </table>
    </div>
</div>
<script>
window.addEventListener("load", window.print());
</script>
</body>
</html>
      