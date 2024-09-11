<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'username' => fake()->unique()->userName(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            // kalau passnya ada, maka isi dgn pass yg sdh ada. kl tdk, generate pass baru
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    /* 
       
       Membuat method yg akan menghasilkan 
       user dengan role admin ketika dijalankan
       pada factories. cara menjalankan:
       1. php artisan tinker
       2. App\Models\User::factory()->admin()->create();

    */
    public function admin(): static
    {
        return $this->state(fn (array $attributes) => [
            'isAdmin' => true,
        ]);
    }
}
