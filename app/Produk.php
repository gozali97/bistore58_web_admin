<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $fillable = [
        'nama_produk', 'harga', 'kategori_id', 'deskripsi', 'gambar', 'stok',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}

