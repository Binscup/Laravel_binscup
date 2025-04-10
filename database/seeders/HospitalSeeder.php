<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HospitalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Hospital::insert([
            ['nama' => 'RS Harapan', 'alamat' => 'Jakarta', 'email' => 'harapan@rs.com', 'telepon' => '021123456'],
            ['nama' => 'RS Kasih Ibu', 'alamat' => 'Bandung', 'email' => 'kasihibu@rs.com', 'telepon' => '022123456'],
        ]);
    }
}
