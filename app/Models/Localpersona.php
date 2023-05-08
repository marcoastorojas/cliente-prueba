<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localpersona extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'localpersonas';

    protected $fillable = ['persona_id','local_id'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function locale()
    {
        return $this->hasOne('App\Models\Locale', 'id', 'local_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function persona()
    {
        return $this->hasOne('App\Models\Persona', 'id', 'persona_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function puntocanges()
    {
        return $this->hasMany('App\Models\Puntocange', 'localpersona_id', 'id');
    }

    public function clientecategoria()
    {
        return $this->belongsTo(Clientecategoria::class);
    }
    
}
