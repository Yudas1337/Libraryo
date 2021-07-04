<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $table = 'sites';
    protected $primaryKey = 'id';
    protected $fillable = ['foto', 'nama', 'email', 'no_telp'];
}
