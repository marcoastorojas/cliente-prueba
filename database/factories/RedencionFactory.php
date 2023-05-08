<?php

namespace Database\Factories;

use App\Models\Redencion;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class RedencionFactory extends Factory
{
    protected $model = Redencion::class;

    public function definition()
    {
        return [
			'techo' => $this->faker->name,
			'titulo' => $this->faker->name,
			'puntos' => $this->faker->name,
			'estado' => $this->faker->name,
			'local_id' => $this->faker->name,
        ];
    }
}
