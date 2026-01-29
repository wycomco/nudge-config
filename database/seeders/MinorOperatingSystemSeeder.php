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
                ['major_operating_system_id' => $major_id, 'version' => '12.7.5', 'release_date' => '2024-05-13', 'about_update_url' => 'https://support.apple.com/en-us/HT214105'],
                ['major_operating_system_id' => $major_id, 'version' => '12.7.6', 'release_date' => '2024-07-29', 'about_update_url' => 'https://support.apple.com/en-us/120910'],
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
                ['major_operating_system_id' => $major_id, 'version' => '13.6.7', 'release_date' => '2024-05-13', 'about_update_url' => 'https://support.apple.com/en-us/HT214107'],
                ['major_operating_system_id' => $major_id, 'version' => '13.6.8', 'release_date' => '2024-07-29', 'about_update_url' => 'https://support.apple.com/en-us/120912'],
                ['major_operating_system_id' => $major_id, 'version' => '13.6.9', 'release_date' => '2024-08-07', 'about_update_url' => ''],
                ['major_operating_system_id' => $major_id, 'version' => '13.7', 'release_date' => '2024-09-16', 'about_update_url' => 'https://support.apple.com/en-us/121234'],
                ['major_operating_system_id' => $major_id, 'version' => '13.7.1', 'release_date' => '2024-10-28', 'about_update_url' => 'https://support.apple.com/en-us/121234'],
                ['major_operating_system_id' => $major_id, 'version' => '13.7.2', 'release_date' => '2024-12-11', 'about_update_url' => 'https://support.apple.com/en-us/121842'],
                ['major_operating_system_id' => $major_id, 'version' => '13.7.3', 'release_date' => '2025-01-27', 'about_update_url' => 'https://support.apple.com/en-us/122070'],
                ['major_operating_system_id' => $major_id, 'version' => '13.7.4', 'release_date' => '2025-02-10', 'about_update_url' => 'https://support.apple.com/en-us/122902'],
                ['major_operating_system_id' => $major_id, 'version' => '13.7.5', 'release_date' => '2025-03-31', 'about_update_url' => 'https://support.apple.com/en-us/122375'],
                ['major_operating_system_id' => $major_id, 'version' => '13.7.6', 'release_date' => '2025-05-12', 'about_update_url' => 'https://support.apple.com/en-us/122718'],
                ['major_operating_system_id' => $major_id, 'version' => '13.7.7', 'release_date' => '2025-07-29', 'about_update_url' => 'https://support.apple.com/en-us/124151'],
                ['major_operating_system_id' => $major_id, 'version' => '13.7.8', 'release_date' => '2025-08-20', 'about_update_url' => 'https://support.apple.com/en-us/124929'],
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
                ['major_operating_system_id' => $major_id, 'version' => '14.5', 'release_date' => '2024-05-13', 'about_update_url' => 'https://support.apple.com/en-us/HT214106'],
                ['major_operating_system_id' => $major_id, 'version' => '14.6', 'release_date' => '2024-07-29', 'about_update_url' => 'https://support.apple.com/en-us/120911'],
                ['major_operating_system_id' => $major_id, 'version' => '14.6.1', 'release_date' => '2024-08-07', 'about_update_url' => ''],
                ['major_operating_system_id' => $major_id, 'version' => '14.7', 'release_date' => '2024-09-16', 'about_update_url' => 'https://support.apple.com/en-us/121247'],
                ['major_operating_system_id' => $major_id, 'version' => '14.7.1', 'release_date' => '2024-10-28', 'about_update_url' => 'https://support.apple.com/en-us/121570'],
                ['major_operating_system_id' => $major_id, 'version' => '14.7.2', 'release_date' => '2024-12-11', 'about_update_url' => 'https://support.apple.com/en-us/121840'],
                ['major_operating_system_id' => $major_id, 'version' => '14.7.3', 'release_date' => '2025-01-27', 'about_update_url' => 'https://support.apple.com/en-us/122069'],
                ['major_operating_system_id' => $major_id, 'version' => '14.7.4', 'release_date' => '2025-02-10', 'about_update_url' => 'https://support.apple.com/en-us/122901'],
                ['major_operating_system_id' => $major_id, 'version' => '14.7.5', 'release_date' => '2025-03-31', 'about_update_url' => 'https://support.apple.com/en-us/122374'],
                ['major_operating_system_id' => $major_id, 'version' => '14.7.6', 'release_date' => '2025-05-12', 'about_update_url' => 'https://support.apple.com/en-us/122717'],
                ['major_operating_system_id' => $major_id, 'version' => '14.7.7', 'release_date' => '2025-07-29', 'about_update_url' => 'https://support.apple.com/en-us/124150'],
                ['major_operating_system_id' => $major_id, 'version' => '14.7.8', 'release_date' => '2025-08-20', 'about_update_url' => 'https://support.apple.com/en-us/124928'],
                ['major_operating_system_id' => $major_id, 'version' => '14.8', 'release_date' => '2025-09-15', 'about_update_url' => 'https://support.apple.com/en-us/125112'],
                ['major_operating_system_id' => $major_id, 'version' => '14.8.1', 'release_date' => '2025-09-29', 'about_update_url' => 'https://support.apple.com/en-us/125330'],
                ['major_operating_system_id' => $major_id, 'version' => '14.8.2', 'release_date' => '2025-11-03', 'about_update_url' => 'https://support.apple.com/en-us/125636'],
                ['major_operating_system_id' => $major_id, 'version' => '14.8.3', 'release_date' => '2025-12-12', 'about_update_url' => 'https://support.apple.com/en-us/125888'],
            ],
            ['version'],
            ['release_date', 'major_operating_system_id', 'about_update_url']
        );

        $major_id = DB::table('major_operating_systems')->where('version', '15')->value('id');

        DB::table('minor_operating_systems')->upsert(
            [
                ['major_operating_system_id' => $major_id, 'version' => '15.0', 'release_date' => '2024-09-16', 'about_update_url' => ''],
                ['major_operating_system_id' => $major_id, 'version' => '15.0.1', 'release_date' => '2024-10-03', 'about_update_url' => ''],
                ['major_operating_system_id' => $major_id, 'version' => '15.1', 'release_date' => '2024-10-28', 'about_update_url' => 'https://support.apple.com/en-us/121564'],
                ['major_operating_system_id' => $major_id, 'version' => '15.1.1', 'release_date' => '2024-11-19', 'about_update_url' => 'https://support.apple.com/en-us/121753'],
                ['major_operating_system_id' => $major_id, 'version' => '15.2', 'release_date' => '2024-12-11', 'about_update_url' => 'https://support.apple.com/en-us/121839'],
                ['major_operating_system_id' => $major_id, 'version' => '15.3', 'release_date' => '2025-01-27', 'about_update_url' => 'https://support.apple.com/en-us/122068'],
                ['major_operating_system_id' => $major_id, 'version' => '15.3.1', 'release_date' => '2025-02-10', 'about_update_url' => 'https://support.apple.com/en-us/122900'],
                ['major_operating_system_id' => $major_id, 'version' => '15.3.2', 'release_date' => '2025-03-11', 'about_update_url' => 'https://support.apple.com/en-us/122283'],
                ['major_operating_system_id' => $major_id, 'version' => '15.4', 'release_date' => '2025-03-31', 'about_update_url' => 'https://support.apple.com/en-us/122373'],
                ['major_operating_system_id' => $major_id, 'version' => '15.4.1', 'release_date' => '2025-04-16', 'about_update_url' => 'https://support.apple.com/en-us/122400'],
                ['major_operating_system_id' => $major_id, 'version' => '15.5', 'release_date' => '2025-05-12', 'about_update_url' => 'https://support.apple.com/en-us/122716'],
                ['major_operating_system_id' => $major_id, 'version' => '15.6', 'release_date' => '2025-07-29', 'about_update_url' => 'https://support.apple.com/en-us/124149'],
                ['major_operating_system_id' => $major_id, 'version' => '15.6.1', 'release_date' => '2025-08-20', 'about_update_url' => 'https://support.apple.com/en-us/124927'],
                ['major_operating_system_id' => $major_id, 'version' => '15.7', 'release_date' => '2025-09-15', 'about_update_url' => 'https://support.apple.com/en-us/125111'],
                ['major_operating_system_id' => $major_id, 'version' => '15.7.1', 'release_date' => '2025-09-29', 'about_update_url' => 'https://support.apple.com/en-us/125329'],
                ['major_operating_system_id' => $major_id, 'version' => '15.7.2', 'release_date' => '2025-11-03', 'about_update_url' => 'https://support.apple.com/en-us/125635'],
                ['major_operating_system_id' => $major_id, 'version' => '15.7.3', 'release_date' => '2025-12-12', 'about_update_url' => 'https://support.apple.com/en-us/125887'],
            ],
            ['version'],
            ['release_date', 'major_operating_system_id', 'about_update_url']
        );

        $major_id = DB::table('major_operating_systems')->where('version', '26')->value('id');

        DB::table('minor_operating_systems')->upsert(
            [
                ['major_operating_system_id' => $major_id, 'version' => '26.0', 'release_date' => '2025-09-15', 'about_update_url' => 'https://support.apple.com/en-us/125110'],
                ['major_operating_system_id' => $major_id, 'version' => '26.0.1', 'release_date' => '2025-09-29', 'about_update_url' => 'https://support.apple.com/en-us/125328'],
                ['major_operating_system_id' => $major_id, 'version' => '26.1', 'release_date' => '2025-11-03', 'about_update_url' => 'https://support.apple.com/en-us/125634'],
                ['major_operating_system_id' => $major_id, 'version' => '26.2', 'release_date' => '2025-12-12', 'about_update_url' => 'https://support.apple.com/en-us/125886'],
            ],
            ['version'],
            ['release_date', 'major_operating_system_id', 'about_update_url']
        );
    }
}
