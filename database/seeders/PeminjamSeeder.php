<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PeminjamSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Siswa',
            'email' => 'siswa@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'peminjam'
        ]);
    }
}
