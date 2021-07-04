<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{

    protected $table = 'bukus';
    protected $primaryKey = 'id';
    protected $fillable = ['judul_buku', 'penulis_buku', 'penerbit_buku', 'foto_buku', 'tahun_penerbit', 'stok', 'id_rak'];

    public function detailPinjam()
    {
        return $this->belongsTo('App\Models\DetailPeminjaman', 'kode_buku');
    }

    public function rak()
    {
        return $this->belongsTo('App\Models\Rak', 'id_rak');
    }
}
