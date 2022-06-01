<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiDetail extends Model
{
    protected $fillable = [
        'transaksi_id', 'produk_id', 'total_item', 'catatan', 'total_harga'
    ];

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, "transkasi_id", "id");
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class, "produk_id", "id");
    }
}
