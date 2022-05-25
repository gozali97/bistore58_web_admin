<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container">
    <div class="alert alert-success mt-5 mb-5">
        <strong>Success!</strong> Pembayaran Telah Berhasil Di Lakukan.
    </div>
  <center><h2>Riwayat Transaksi Pembayaran Payment</h2></center>

    <strong>Informasi</strong>
    <p>Lakukan Proses Pembayaran Sebelum Batas Pembayaran yang ada, simpan halaman ini jika nantinya di rasa dibutuhkan informasi terkait kode pembayaran yang ada,</p>
    <div class="card">
        <div class="card-body table-responsive">
            <div class="row">
                <div class="col-md-2">
                    <label for="">Bank</label>
                </div>
                <div class="col-md-10">
                    : {{ $data->bank}}
                </div>
            </div>
            <?php 
            if($data->va_number != '-'){ ?>
                <div class="row">
                    <div class="col-md-2">
                        <label for="">Va Number</label>
                    </div>
                    <div class="col-md-10">
                        : {{$data->va_number}}  
                    </div>
                </div>
            <?php }else{ ?>
                <div class="row">
                    <div class="col-md-2">
                        <label for="">Bill Key </label>
                    </div>
                    <div class="col-md-10">
                        {{$data->bill_key}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <label for="">Biller Code</label>
                    </div>
                    <div class="col-md-10">
                        {{$data->biller_code}}
                    </div>
                </div> 
            <?php } ?>
            <div class="row">
                <div class="col-md-2">
                    <label for="">Tanggal Pembayaran</label>
                </div>
                <div class="col-md-10">
                   : {{ $data->tgl_payment}}
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <label for="">Batas Pembayaran</label>
                </div>
                <div class="col-md-10">
                   : {{ $batas_bayar}}
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
