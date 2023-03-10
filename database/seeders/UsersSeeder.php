<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create main user
        User::create([
            'name' => 'John DOE',
            'email' => 'admin@admin.com',
            'password' => 'password',
            'is_developer' => '1',
        ]);

        // Create dummy users
        User::factory()->count(4)->create();
    }
}
