<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    function pinjaman()
    {
        return $this->hasMany(Pinjaman::class);
    }
}
