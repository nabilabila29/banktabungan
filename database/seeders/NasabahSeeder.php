<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Nasabah;

class NasabahSeeder extends Seeder
{
    public function run()
    {
        Nasabah::create([
            'nama' => 'John Doe',
            'nik' => '1234567890123456',
            'email' => 'john.doe1@example.com',
            'telepon' => '081234567890',
            'alamat' => 'Jl. Contoh No. 1, Jakarta',
        ]);

        Nasabah::create([
            'nama' => 'Jane Smith',
            'nik' => '6543210987654321',
            'email' => 'jane@example.com',
            'telepon' => '085678901234',
            'alamat' => 'Jl. Sampel No. 2, Bandung',
        ]);
    }
}