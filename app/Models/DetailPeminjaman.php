<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPeminjaman extends Model
{

    protected $table         = 'detail_peminjamen';
    protected $primaryKey    = 'id';
    protected $fillable      = ['nota', 'kode_buku'];

    public function buku()
    {
        return $this->hasMany('App\Models\Buku', 'id');
    }

    public function peminjaman()
    {
        //  return $this->hasMany('App\Models\Peminjaman', 'nota');
        return $this->belongsToMany('App\Models\Peminjaman', 'detail_peminjamen', 'nota', 'nota', 'nota', 'nota', 'nota');
    }
}
