<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    public function localplan()
    {
        return $this->belongsTo(Localplan::class);
    }

    public function detalleventa()
    {
        return $this->hasOne(Detalleventa::class);
    }
}
