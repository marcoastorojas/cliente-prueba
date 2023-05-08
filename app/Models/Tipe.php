<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipe extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'tipes';

    protected $fillable = ['tipos','descripcion','estado','ordenar'];


    public function locales()
    {
        return $this->hasMany('App\Models\Locale', 'tipe_id', 'id');
    }
	
}
