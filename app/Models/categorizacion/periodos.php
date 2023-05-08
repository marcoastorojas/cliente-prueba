<?php

namespace App\Models\categorizacion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periodos extends Model
{
    use HasFactory;
    protected $table = 'categorizacion_periodos';

    protected $fillable = [ 'id','categorizacion_id','local_id','fecha_inicio','fecha_fin','descripcion','status','fecha_inicio_ant','fecha_fin_ant'];
   


  
}
