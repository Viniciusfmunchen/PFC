<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Factories\PostFactory;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@sokaanimes.com',
            'type' => '0',
            'password' => Hash::make('adminsokaanimes')
        ]);

        $this->call(WorkSeeder::class);
        $this->call(CharacterSeeder::class);
        UserFactory::new()->count(20)->has(PostFactory::new()->count(20))->create();
    }
}

