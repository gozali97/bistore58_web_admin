<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $primaryKey = "id_kategori";
    protected $fillable = [
        'nama_kategori',
    ];
    public function kategori()
    {
        return $this->hasMany(Produk::class, "kategori_id", "id_kategori");
    }
}
