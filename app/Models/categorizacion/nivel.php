<?php

namespace App\Models\categorizacion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nivel extends Model
{
    use HasFactory;
    protected $table = 'niveles';
    protected $fillable = ['id','titulo','icon','card','banner','tag','cssColor' ];

}
