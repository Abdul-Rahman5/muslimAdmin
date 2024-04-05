<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\CategoryDoaa;
use App\Models\CateogryAzkar;
use App\Models\DetailsAzkar;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // $this->call([
        //     UserSeeder::class
        // ]);
        // CateogryAzkar::factory(10)->create();
        DetailsAzkar::factory(10)->create();
        // CategoryDoaa::factory(10)->create();
    }
}
