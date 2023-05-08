<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locale extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $table = 'locales';

    protected $fillable = ['titulo', 'ruc', 'descripcion', 'direccion', 'ciudad', 'celular', 'user_id', 'tipe_id', 'config_punto', 'config_monto', 'estado', 'email','dominio', 
                            'nombresprop', 'apellidosprop', 'correoprop', 'celularprop','restriccion','logo','registro','comprobante','ciudad_id','multipuntos','catalogo','nombrecatalogo','banner','icono_tarjeta'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tipe()
    {
        return $this->hasOne('App\Models\Tipe', 'id', 'tipe_id');
    }
    public function ciudade()
    {
        return $this->hasOne('App\Models\Ciudad', 'id', 'ciudad_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    public function redenciones()
    {
        return $this->hasMany('App\Models\Redencion', 'local_id', 'id');
    }
    public function localpersonas()
    {
        return $this->hasMany('App\Models\Localpersona', 'local_id', 'id');
    }
    public function infolocals()
    {
        return $this->hasMany('App\Models\Infolocal', 'local_id', 'id');
    }
    public function localplan()
    {
        return $this->hasOne('App\Models\Localplan', 'locale_id', 'id');
    }

    public function Promociones()
    {
        return $this->hasMany('App\Models\Promocione', 'locale_id', 'id');
    }
}
