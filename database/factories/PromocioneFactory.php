<?php

namespace Database\Factories;

use App\Models\Promocione;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PromocioneFactory extends Factory
{
    protected $model = Promocione::class;

    public function definition()
    {
        return [
			'locale_id' => $this->faker->name,
			'titulo' => $this->faker->name,
			'file' => $this->faker->name,
			'estado' => $this->faker->name,
			'fechaini' => $this->faker->name,
			'fechafin' => $this->faker->name,
			'lclfechaini' => $this->faker->name,
			'lclfechafin' => $this->faker->name,
        ];
    }
}
