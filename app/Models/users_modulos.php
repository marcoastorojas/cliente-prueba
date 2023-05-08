<?php

namespace App\Models;

use App\Models\roles\Modulos;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users_modulos extends Model
{
    use HasFactory;

    protected $fillable = [
		'user_id',
		'modulo_id'
	];



    public function modulo()
	{
		return $this->belongsTo(Modulos::class, 'modulo_id');
	}






}
