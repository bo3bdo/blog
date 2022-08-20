<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text(255),
            'body' => $this->faker->text,
            'slug' => $this->faker->slug,
            'type' => $this->faker->word,
            'user_id' => \App\Models\User::factory(),
            'categor_id' => \App\Models\Categor::factory(),
        ];
    }
}
