<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_satuan extends Model
{
    use HasFactory;
    protected $table = 'tb_satuans';
    protected $prymarykey = 'id';
    protected $fillable = ['nama_satuan'];
}
