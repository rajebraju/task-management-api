<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // Create a new user
        $user = User::create([
            'name' => 'Test User',
            'email' => 'testuser@example.com',
            'password' => Hash::make('password'), // Ensure you hash the password
        ]);

        // Generate a Sanctum token for the user
        $token = $user->createToken('TestToken')->plainTextToken;

        // Output the token to the console
        $this->command->info("User created with email: testuser@example.com");
        $this->command->info("Sanctum Token: $token");
    }
}
