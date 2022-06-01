<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;

class Transaksi extends Model
{
    protected $fillable = [
        'user_id', 'kode_payment', 'kode_trx', 'total_produk', 'total_harga', 'kode_unik',
        'status', 'no_resi', 'kurir', 'no_tlp', 'nama_penerima', 'detail_lokasi', 'deskripsi',
        'metode_bayar', 'expired_at', 'jasa_pengiriman', 'ongkir', 'total_bayar', 'bank'
    ];

    public function details()
    {
        return $this->hasMany(TransaksiDetail::class, "transaksi_id", "id");
    }

    public function user()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }


    public function detail($id)
    {
        return DB::table('transaksis')->where('id', $id)->first();
    }

    public function update_data($id, $data)
    {
        DB::table('transaksis')->where('id', $id)->update($data);
    }

    public function update_status($order_id, $status)
    {
        error_log(strval($order_id));
        error_log($status);
        // DB::table('transaksis')->where('transaksis');
        DB::table('transaksis')->where('order_id', $order_id)->update([
            'status' => $status
        ]);
        error_log('update status transaksi');
    }
}
