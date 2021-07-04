<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    protected $table = 'pengembalians';
    protected $primaryKey = 'nota';
    protected $fillable = ['nota', 'kode_user', 'kode_petugas', 'denda', 'tanggal_pengembalian', 'keterangan'];

    public function user()
    {
        return $this->hasMany('App\Models\User', 'id', 'kode_user');
    }

    public function petugas()
    {
        return $this->hasMany('App\Models\User', 'id', 'kode_petugas');
    }

    public function peminjaman()
    {
        return $this->hasOne('App\Models\Peminjaman', 'nota');
    }
}
