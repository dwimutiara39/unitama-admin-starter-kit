<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    
    public function run(): void
    {
        Setting::create([
            'app_name'=>'Admin Laravel',
            'copyright'=>'Admin Laravel || 2026',
            'login_title'=>'Admin Laravel',
            'keywoards'=>'laravel admin panel, dashboard laravel, root admin, cms laravel, aplikasi backoffice, manajemen user laravel, template admin laravel, sistem informasi manajemen, laravel starter kit, fitu superadmin',
            'description'=>'Sistem dashboard admin (Root Admin) berbasis Laravel yang dirancang untuk mengelola pengaturan aplikasi, manajemen pengguna, hak akses (roles), dan konfigurasi sistem secara aman, efisien, dan responsif.'
        ]);
    }
}
