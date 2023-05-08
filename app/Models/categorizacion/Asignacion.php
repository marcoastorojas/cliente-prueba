<?php

namespace App\Models\categorizacion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignacion extends Model
{
    use HasFactory;
    protected $table = 'categorizacion_asignacion_nivel';
    protected $fillable = ['id','user_id','local_id','local_id','fecha','categorizacion_nivel_id','descripcion','categorizacion_periodo_id','create_by'];

}
