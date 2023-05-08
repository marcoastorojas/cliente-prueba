<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localplan extends Model
{
    use HasFactory;

    public function plane()
    {
        return $this->belongsTo(Plane::class);
    }

    public function periodo()
    {
        return $this->belongsTo(Periodo::class);
    }

    public function locale()
    {
        return $this->belongsTo(Locale::class);
    }
}
