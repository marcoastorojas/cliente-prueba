<?php

namespace Database\Factories;

use App\Models\Puntocange;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PuntocangeFactory extends Factory
{
    protected $model = Puntocange::class;

    public function definition()
    {
        return [
			'localpersona_id' => $this->faker->name,
			'persona_id' => $this->faker->name,
			'tipopunto' => $this->faker->name,
			'monto' => $this->faker->name,
			'puntos' => $this->faker->name,
        ];
    }
}
