<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if (App::environment('local')) {
            $this->call([
                UsersSeeder::class,
            ]);
        }
        $this->call([
            MajorOperatingSystemSeeder::class,
            MinorOperatingSystemSeeder::class,
            HardwareModelSeeder::class,
            ConfigurationsSeeder::class,
        ]);
    }
}
