<?php

namespace Database\Factories;

use App\Models\Categor;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Categor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->sentence(15),
            'slug' => $this->faker->slug,
        ];
    }
}
