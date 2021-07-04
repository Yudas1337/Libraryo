<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPengembalian extends Model
{
    protected $table = 'detail_pengembalians';
    protected $primaryKey = 'id';
    protected $fillable = ['nota', 'kode_buku'];
}
