<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;

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
    public function definition(): array
    {
        // membuat data dummy berdasarkan data pada migration post
        return [
            'title' => fake()->sentence(),
            /*
               Command di bawah ini akan men-generate user baru
               pada model User utk setiap post baru. Agar bisa
               men-generate user secara customize, gunakan sintaks:
               
               App\Models\Post::factory(100)->recycle(User::factory(5)->create())->create();
               -> Sintaks diatas akan membuat 100 post dengan hanya 5 user 
                  (user & post dihubungkan secara acak)

            */
            'author_id' => User::factory(),
            'category_id' => fake()->numberBetween(1, 5),
            'slug' => Str::slug(fake()->sentence()),
            'body' => fake()->text()
        ];
    }
}
