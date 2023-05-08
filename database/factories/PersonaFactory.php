<?php

namespace Database\Factories;

use App\Models\Persona;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PersonaFactory extends Factory
{
    protected $model = Persona::class;

    public function definition()
    {
        return [
			'dni' => $this->faker->name,
			'nombres' => $this->faker->name,
			'celular' => $this->faker->name,
			'correo' => $this->faker->name,
			'fechanac' => $this->faker->name,
			'estado' => $this->faker->name,
        ];
    }
}
