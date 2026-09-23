<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['nama_barang', 'stok', 'harga'])]
#[Table('barangs')]
class Barang extends Model
{
    //
}
