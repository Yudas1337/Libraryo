<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rak extends Model
{
    protected $table = 'raks';
    protected $primaryKey = 'id';
    protected $fillable = ['nama_rak', 'lokasi_rak'];

    public function buku()
    {
        return $this->hasMany('App\Models\Buku', 'id');
    }
}
