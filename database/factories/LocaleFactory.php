<?php

namespace Database\Factories;

use App\Models\Locale;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class LocaleFactory extends Factory
{
    protected $model = Locale::class;

    public function definition()
    {
        return [
			'titulo' => $this->faker->name,
			'descripcion' => $this->faker->name,
			'direccion' => $this->faker->name,
			'ciudad' => $this->faker->name,
			'celular' => $this->faker->name,
			'user_id' => $this->faker->name,
			'tipe_id' => $this->faker->name,
			'config_punto' => $this->faker->name,
			'config_monto' => $this->faker->name,
			'estado' => $this->faker->name,
        ];
    }
}
