<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}