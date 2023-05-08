<?php

namespace Database\Factories;

use App\Models\Tipe;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TipeFactory extends Factory
{
    protected $model = Tipe::class;

    public function definition()
    {
        return [
			'tipos' => $this->faker->name,
			'descripcion' => $this->faker->name,
			'estado' => $this->faker->name,
        ];
    }
}
