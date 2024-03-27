<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UpdateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            MajorOperatingSystemSeeder::class,
            MinorOperatingSystemSeeder::class,
            HardwareModelSeeder::class,
        ]);
    }
}
