<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = fake()->paragraph(1);
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'subtitle' => fake()->paragraph(1),
            'description' => fake()->paragraph(5),
            'author' => fake()->randomElement(User::all()->pluck('id')->toArray())
        ];
    }
}
