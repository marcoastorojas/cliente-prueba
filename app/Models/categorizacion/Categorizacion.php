<?php

namespace App\Models\categorizacion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorizacion extends Model
{
    use HasFactory;
    
    protected $table = 'categorizacion';

    protected $fillable = ['id','start_date','periodos','estatus','local_id','user_id'];

}
