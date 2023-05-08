<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promocione extends Model
{
    use HasFactory;

    public function local()
    {
        return $this->belongsTo('App\Models\Locale', 'locale_id', 'id');
    }
}
