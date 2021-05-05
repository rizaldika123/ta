<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjaman extends Model
{
    use HasFactory;
    function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
    function user()
    {
        return $this->belongsTo(User::class);
    }
    function bunga()
    {
        return $this->belongsTo(Bunga::class);
    }
    function angsuran()
    {
        return $this->hasMany(Angsuran::class);
    }
    function biayaAdministrasi()
    {
        return $this->belongsTo(BiayaAdministrasi::class);
    }
    function tempo()
    {
        return $this->belongsTo(Tempo::class);
    }
}
