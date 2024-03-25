<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->name = 'Nudge Admin';
        $user->email = 'admin@'.parse_url(Config::get('app.url'))['host'];
        $user->password = bcrypt('admin');
        $user->save();
    }
}
