<?php

namespace Database\Seeders;

use App\Models\Pengguna;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenggunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pengguna = Pengguna::query()->create([
            'nama' => 'Fulan',
            'email' => 'fulan@pengguna.com',
            'password' => 'fulan123',
        ]);

        return $pengguna;
    }
}
