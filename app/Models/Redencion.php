<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Redencion extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'redencions';

    protected $fillable = ['techo','titulo','puntos','estado','local_id', 'foto','costo','precio','modificar'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function locale()
    {
        return $this->hasOne('App\Models\Locale', 'id', 'local_id');
    }
    
}
