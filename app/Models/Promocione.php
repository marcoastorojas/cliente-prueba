<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promocione extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'promociones';

    protected $fillable = ['locale_id','titulo','file','estado','fechaini','fechafin','lclfechaini','lclfechafin'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    // public function locale()
    // {
    //     return $this->hasOne('App\Models\Locale', 'id', 'locale_id');
    // }

    public function local()
    {
        return $this->belongsTo('App\Models\Locale', 'locale_id', 'id');
    }
    
}
