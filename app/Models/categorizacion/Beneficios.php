<?php

namespace App\Models\categorizacion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficios extends Model
{
    use HasFactory;
    protected $table = 'categorizacion_beneficios';

    protected $fillable = ['id','titulo','descripcion','categorizacion_nivel_id','images','local_id','user_id','tyc'];

        
}
