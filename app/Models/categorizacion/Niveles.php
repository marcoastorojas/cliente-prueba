<?php

namespace App\Models\categorizacion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Niveles extends Model
{
    use HasFactory;
    protected $table = 'categorizacion_niveles';

    protected $fillable = ['id','titulo','descripcion','images','min_puntos','max_puntos','local_id','user_id','nivel_id' ];


    public function beneficios()
    {
        return $this->hasMany('App\Models\categorizacion\Beneficios', 'categorizacion_nivel_id', 'id');
    }

    public function info()
    {
        return $this->hasOne('App\Models\categorizacion\Nivel', 'id', 'nivel_id');
    }


}
