<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MinorOperatingSystemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $major_id = DB::table('major_operating_systems')->where('version', '11')->value('id');

        DB::table('minor_operating_systems')->upsert(
            [
                ['major_operating_system_id' => $major_id, 'version' => '11.7.9', 'release_date' => '2023-07-23', 'about_update_url' => ''],
                ['major_operating_system_id' => $major_id, 'version' => '11.7.10', 'release_date' => '2023-09-11', 'about_update_url' => ''],
            ],
            ['version'],
            ['release_date', 'major_operating_system_id', 'about_update_url']
        );

        $major_id = DB::table('major_operating_systems')->where('version', '12')->value('id');

        DB::table('minor_operating_systems')->upsert(
            [
                ['major_operating_system_id' => $major_id, 'version' => '12.7.3', 'release_date' => '2024-01-22', 'about_update_url' => ''],
                ['major_operating_system_id' => $major_id, 'version' => '12.7.4', 'release_date' => '2024-03-07', 'about_update_url' => ''],
            ],
            ['version'],
            ['release_date', 'major_operating_system_id', 'about_update_url']
        );

        $major_id = DB::table('major_operating_systems')->where('version', '13')->value('id');

        DB::table('minor_operating_systems')->upsert(
            [
                ['major_operating_system_id' => $major_id, 'version' => '13.0', 'release_date' => '2022-10-24', 'about_update_url' => ''],
                ['major_operating_system_id' => $major_id, 'version' => '13.0.1', 'release_date' => '2022-09-09', 'about_update_url' => ''],
                ['major_operating_system_id' => $major_id, 'version' => '13.1', 'release_date' => '2022-12-13', 'about_update_url' => ''],
                ['major_operating_system_id' => $major_id, 'version' => '13.2', 'release_date' => '2023-01-23', 'about_update_url' => ''],
                ['major_operating_system_id' => $major_id, 'version' => '13.2.1', 'release_date' => '2023-02-13', 'about_update_url' => ''],
                ['major_operating_system_id' => $major_id, 'version' => '13.3', 'release_date' => '2023-03-27', 'about_update_url' => ''],
                ['major_operating_system_id' => $major_id, 'version' => '13.3.1', 'release_date' => '2023-04-07', 'about_update_url' => ''],
                ['major_operating_system_id' => $major_id, 'version' => '13.4', 'release_date' => '2023-05-18', 'about_update_url' => ''],
                ['major_operating_system_id' => $major_id, 'version' => '13.4.1', 'release_date' => '2023-06-21', 'about_update_url' => ''],
                ['major_operating_system_id' => $major_id, 'version' => '13.4.1a', 'release_date' => '2023-07-10', 'about_update_url' => ''],
                ['major_operating_system_id' => $major_id, 'version' => '13.4.1b', 'release_date' => '2023-07-13', 'about_update_url' => ''],
                ['major_operating_system_id' => $major_id, 'version' => '13.5', 'release_date' => '2023-07-24', 'about_update_url' => ''],
                ['major_operating_system_id' => $major_id, 'version' => '13.5.1', 'release_date' => '2023-08-17', 'about_update_url' => ''],
                ['major_operating_system_id' => $major_id, 'version' => '13.5.2', 'release_date' => '2023-09-07', 'about_update_url' => ''],
                ['major_operating_system_id' => $major_id, 'version' => '13.6', 'release_date' => '2023-09-21', 'about_update_url' => ''],
                ['major_operating_system_id' => $major_id, 'version' => '13.6.1', 'release_date' => '2023-10-25', 'about_update_url' => ''],
                ['major_operating_system_id' => $major_id, 'version' => '13.6.2', 'release_date' => '2023-11-07', 'about_update_url' => ''],
                ['major_operating_system_id' => $major_id, 'version' => '13.6.3', 'release_date' => '2023-12-11', 'about_update_url' => 'https://support.apple.com/en-us/HT214038'],
                ['major_operating_system_id' => $major_id, 'version' => '13.6.4', 'release_date' => '2024-01-22', 'about_update_url' => 'https://support.apple.com/en-us/HT214058'],
                ['major_operating_system_id' => $major_id, 'version' => '13.6.5', 'release_date' => '2024-03-14', 'about_update_url' => 'https://support.apple.com/en-us/HT214085'],
                ['major_operating_system_id' => $major_id, 'version' => '13.6.6', 'release_date' => '2024-03-25', 'about_update_url' => 'https://support.apple.com/en-us/HT214095'],
            ],
            ['version'],
            ['release_date', 'major_operating_system_id', 'about_update_url']
        );

        $major_id = DB::table('major_operating_systems')->where('version', '14')->value('id');

        DB::table('minor_operating_systems')->upsert(
            [
                ['major_operating_system_id' => $major_id, 'version' => '14.0', 'release_date' => '2023-09-22', 'about_update_url' => ''],
                ['major_operating_system_id' => $major_id, 'version' => '14.1', 'release_date' => '2023-10-25', 'about_update_url' => ''],
                ['major_operating_system_id' => $major_id, 'version' => '14.1.1', 'release_date' => '2023-11-07', 'about_update_url' => ''],
                ['major_operating_system_id' => $major_id, 'version' => '14.1.2', 'release_date' => '2023-11-30', 'about_update_url' => ''],
                ['major_operating_system_id' => $major_id, 'version' => '14.2', 'release_date' => '2023-12-11', 'about_update_url' => ''],
                ['major_operating_system_id' => $major_id, 'version' => '14.2.1', 'release_date' => '2023-12-19', 'about_update_url' => ''],
                ['major_operating_system_id' => $major_id, 'version' => '14.3', 'release_date' => '2024-01-22', 'about_update_url' => ''],
                ['major_operating_system_id' => $major_id, 'version' => '14.3.1', 'release_date' => '2024-02-08', 'about_update_url' => ''],
                ['major_operating_system_id' => $major_id, 'version' => '14.4', 'release_date' => '2024-03-07', 'about_update_url' => ''],
                ['major_operating_system_id' => $major_id, 'version' => '14.4.1', 'release_date' => '2024-03-25', 'about_update_url' => 'https://support.apple.com/en-us/HT214096'],
            ],
            ['version'],
            ['release_date', 'major_operating_system_id', 'about_update_url']
        );
    }
}
