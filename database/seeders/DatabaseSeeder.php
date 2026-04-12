<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kategori;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         Kategori::insert([
            ['nama_kategori' => 'Infrastruktur', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kategori' => 'Pelayanan Publik', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kategori' => 'Lingkungan', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kategori' => 'Keamanan', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kategori' => 'Lainnya', 'created_at' => now(), 'updated_at' => now()],
        ]);

    }
}
