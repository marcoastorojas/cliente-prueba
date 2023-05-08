<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Userlocal
 * 
 * @property int $id
 * @property int $user_id
 * @property int $local_id
 * @property Carbon|null $created_at
 * 
 * @property Locale $locale
 * @property User $user
 * @property Collection|Localpersona[] $localpersonas
 *
 * @package App\Models
 */
class Userlocal extends Model
{
	protected $table = 'userlocals';
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int',
		'local_id' => 'int'
	];

	protected $fillable = [
		'user_id',
		'local_id'
	];

	public function locale()
	{
		return $this->belongsTo(Locale::class, 'local_id');
	}

	public function user()
	{
		return $this->belongsTo(User::class,'user_id');
	}

	public function localpersonas()
	{
		return $this->hasMany(Localpersona::class);
	}
}
