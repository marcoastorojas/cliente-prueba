<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'personas';

    protected $fillable = ['tipodoc', 'dni','dnicod','nombres','celular','correo','fechanac','estado','user_id', 'apellidos','codpais','ciudad_id'];

    public function locales()
    {
        return $this->hasMany(Localpersona::class);
    }

    public function localperon()
    {
        return $this->hasOne(Localpersona::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ciudade()
    {
        return $this->hasOne('App\Models\Ciudad', 'id', 'ciudad_id');
    }
	
}
