<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Angsuran extends Model
{
    use HasFactory;
    function pinjaman()
    {
        return $this->pinjaman(Pinjaman::class);
    }
}
