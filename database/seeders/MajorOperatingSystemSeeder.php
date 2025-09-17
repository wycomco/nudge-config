<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MajorOperatingSystemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('major_operating_systems')->upsert(
            [
                ['name' => 'macOS 11 Big Sur', 'version' => '11', 'about_update_url' => 'https://support.apple.com/en-us/106338', 'major_upgrade_app_path' => '/Applications/Install macOS Big Sur.app'],
                ['name' => 'macOS 12 Monterey', 'version' => '12', 'about_update_url' => 'https://support.apple.com/en-us/106339', 'major_upgrade_app_path' => '/Applications/Install macOS Monterey.app'],
                ['name' => 'macOS 13 Ventura', 'version' => '13', 'about_update_url' => 'https://support.apple.com/en-us/106337', 'major_upgrade_app_path' => '/Applications/Install macOS Ventura.app'],
                ['name' => 'macOS 14 Sonoma', 'version' => '14', 'about_update_url' => 'https://www.apple.com/macos/sonoma/', 'major_upgrade_app_path' => '/Applications/Install macOS Sonoma.app'],
                ['name' => 'macOS 15 Sequoia', 'version' => '15', 'about_update_url' => 'https://www.apple.com/macos/macos-sequoia/', 'major_upgrade_app_path' => '/Applications/Install macOS Sequoia.app'],
                ['name' => 'macOS 26 Tahoe', 'version' => '26', 'about_update_url' => 'https://www.apple.com/os/macos/', 'major_upgrade_app_path' => '/Applications/Install macOS Tahoe.app'],
            ],
            ['version'],
            ['name', 'about_update_url', 'major_upgrade_app_path']
        );
    }
}
