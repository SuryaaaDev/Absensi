<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $faker = Faker::create();

        for ($i = 1; $i <= 10; $i++) {
            User::create([
                'card_number' => str_pad($i, 6, '0', STR_PAD_LEFT),
                'absen' => $i,
                'name' => $faker->name(),
                'class_id' => $faker->numberBetween(1, 6),
                'email' => $faker->unique()->safeEmail(),
                'telepon' => $faker->phoneNumber(),
                'is_admin' => false,
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
            ]);
        }
    }
}
