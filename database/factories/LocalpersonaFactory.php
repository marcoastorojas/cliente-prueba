<?php

namespace Database\Factories;

use App\Models\Localpersona;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class LocalpersonaFactory extends Factory
{
    protected $model = Localpersona::class;

    public function definition()
    {
        return [
			'persona_id' => $this->faker->name,
			'local_id' => $this->faker->name,
        ];
    }
}
