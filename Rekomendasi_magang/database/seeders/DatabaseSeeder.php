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
        // User::factory(10)->create();
    $this->call([
        AdminSeeder::class,
        PerusahaanSeeder::class,
        MinatBidangSeeder::class,
        TechnologySeeder::class,
        SkillSeeder::class,
        perusahaan_posisipvtSeeder::class,
        perusahaan_technologypvtSeeder::class,
        perusahaan_skillpvtSeeder::class,
        UlasanSeeder::class,
        
    ]);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
