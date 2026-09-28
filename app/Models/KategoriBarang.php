<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;

#[Table('kategori_barangs')]
#[Fillable(['nama_kategori'])]
class KategoriBarang extends Model
{
    public function Barang ()
    {
        return $this->hasMany(Barang::class, 'kategori_id');
    }
}
