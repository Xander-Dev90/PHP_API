<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Ticket;
use App\Models\Tag;
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
        // User::factory(10)->create();
        // Usuario admin fijo
        User::firstOrCreate(
            ['email' => 'p3rs4@admin.com'],
            [
                'name' => 'Admin',
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
            ]
        );

        \App\Models\User::factory()->count(29)->create();

        \App\Models\Category::factory()->count(12)->create();
        \App\Models\Tag::factory()->count(20)->create();
        \App\Models\Ticket::factory()->count(50)->create();
        

        // may to may
        $tickets = \App\Models\Ticket::all();
        $tags = \App\Models\Tag::all();

        foreach ($tickets as $ticket) {
            $ticket->tags()->attach($tags->random(rand(2, 4))->pluck('id')->toArray());
        }

    }
}
