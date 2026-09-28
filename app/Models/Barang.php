<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['nama_barang', 'stok', 'harga', 'kategori_id'])]
#[Table('barangs')]
class Barang extends Model
{
    public function kategori_barangs() // <-- This must match what you typed in Blade
    {
        return $this->belongsTo(KategoriBarang::class, 'kategori_id');
    }
}
