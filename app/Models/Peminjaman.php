<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{

    protected $table = 'peminjamen';
    protected $primaryKey = 'nota';
    protected $fillable = ['nota', 'kode_user', 'tanggal_pinjam', 'tanggal_kembali'];

    public function user()
    {
        return $this->hasMany('App\Models\User', 'id', 'kode_user');
    }

    public function detail()
    {
        //return $this->belongsTo('App\Models\DetailPeminjaman', 'nota', 'nota');
        return $this->belongsToMany('App\Models\DetailPeminjaman', 'peminjamen', 'nota', 'nota', 'nota', 'nota');
    }

    public function pengembalian()
    {
        return $this->hasOne('App\Models\Pengembalian', 'nota');
    }
}
