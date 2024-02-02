<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_masuk extends Model
{
    use HasFactory;
    protected $table = 'tb_masuks';
    protected $fillable = [
        'id_masuk',
        'barang',
        'jumlah',
        'tanggal'
    
    
    ];
}
