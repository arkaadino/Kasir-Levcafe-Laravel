<?php

namespace Database\Seeders;
use App\Models\Jenis;
use App\Models\User;
use App\Models\Merek;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password'=> bcrypt('admin'),
            'role' => 'admin',
        ]);

        Jenis::create([
            'nama_jenis' => 'Makanan',
        ]);

    }
}
