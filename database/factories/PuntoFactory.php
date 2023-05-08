<?php

namespace Database\Factories;

use App\Models\Punto;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PuntoFactory extends Factory
{
    protected $model = Punto::class;

    public function definition()
    {
        return [
			'localper_id' => $this->faker->name,
			'persona_id' => $this->faker->name,
			'tipopunto' => $this->faker->name,
			'monto' => $this->faker->name,
			'puntos' => $this->faker->name,
        ];
    }
}
