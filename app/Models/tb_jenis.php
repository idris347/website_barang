<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_jenis extends Model
{
    use HasFactory;
    protected $table = 'tb_jenis';
    protected $prymarykey = 'id';
    protected $fillable = ['nama_jenis'];
}
