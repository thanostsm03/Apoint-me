<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $users = User::factory(100)->create();

        $users->take(50)->each(function ($user) {
            \App\Models\Owner::factory()->create([
                'user_id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
            ]);
        });

        $businesses = \App\Models\Business::factory(100)->create();

        $businesses->each(function ($business) {
            \App\Models\Service::factory(10)->create([
                'business_id' => $business->id,
            ]);
        });

        User::factory(1)->create([
            'name' => 'test',
            'email' => 'test@example.com',
            'password' => 'password',
        ]);

    }
}
