<?php

namespace Database\Seeders;

use App\Models\Configuration;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ConfigurationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = json_decode(File::get('database/json/default_nudge_config.json'));
        
        $convertedJson = [];
        foreach ($json as $key => $value) {
            $convertedJson[] = [
                'type' => $key,
                'data' => $value,
            ];
        }

        Configuration::upsert([
            ['name' => 'Generic', 'slug' => 'generic', 'nudge_config' => json_encode($convertedJson)],
        ], uniqueBy: ['slug'], update: ['nudge_config']);
    }
}
