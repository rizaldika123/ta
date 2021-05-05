<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BiayaAdministrasi extends Model
{
    use HasFactory;
    function biayaAdministrasi()
    {
        return $this->hasMany(BiayaAdministrasi::class);
    }
}
