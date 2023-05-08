<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puntocange extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'puntocanges';

    protected $fillable = ['localpersona_id','persona_id','tipopunto','monto','puntos','local','redencion_id','variante','descripcion','cuponid'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function localpersona()
    {
        return $this->hasOne('App\Models\Localpersona', 'id', 'localpersona_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function persona()
    {
        return $this->hasOne('App\Models\Persona', 'id', 'persona_id');
    }
    
}
