<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataBarang extends Model
{
    use HasFactory;

    protected $table = 'data_barang';

    protected $primaryKey = 'idbarang';

    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = [
        'idbarang',
        'nama_barang',
        'harga',
        'stok',
        'foto',
    ];
}
