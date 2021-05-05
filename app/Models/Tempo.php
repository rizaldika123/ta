<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tempo extends Model
{
    use HasFactory;
    function biayaAdministrasi()
    {
        return $this->hasMany(biayaAdministrasi::class);
    }
    function pinjaman()
    {
        return $this->hasMany(Pinjaman::class);
    }
}
