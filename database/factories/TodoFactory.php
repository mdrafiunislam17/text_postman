<?php

namespace Database\Factories;

use App\Models\Todo;
use Illuminate\Database\Eloquent\Factories\Factory;

class TodoFactory extends Factory
{
    protected $model = Todo::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3), // short sentence, e.g., "Buy groceries now"
            'description' => $this->faker->sentence(), // random short sentence
        ];
    }
}
