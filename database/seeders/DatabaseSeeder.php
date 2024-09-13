<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // setiap kali seeder dijalankan, user ini akan dimasukkan ke db
        $user_admin = User::create([
            'name' => 'Admin',
            'username' => "admin123",
            'email' => "admin@gmail.com",
            'email_verified_at' => now(),
            'isAdmin' => true,
            'password' => Hash::make('admin12345'),
            'remember_token' => Str::random(10)

        ]);

        Post::factory(100)->recycle([
            Category::factory(5)->create(),
            $user_admin,
            User::factory(10)->create()
        ])->create();
    }
}
