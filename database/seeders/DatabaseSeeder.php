<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User; // Pastikan Anda mengimpor model User

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Solusi 1: Truncate tabel (jika ingin memulai dari awal)
        // DB::table('users')->truncate();

        // Solusi 2 & 3: firstOrCreate() atau periksa keberadaan
        User::firstOrCreate(
            ['email' => 'admin@example.com'], // Cari berdasarkan email
            [
                'name' => 'Admin',
                'password' => Hash::make('password_admin_anda'),
                'roles' => 'ADMIN',
                'email_verified_at' => now(), // Verifikasi email jika perlu
            ]
        );

        // Alternatif solusi 3: Periksa keberadaan dengan lebih eksplisit
        // if (!User::where('email', 'admin@example.com')->exists()) {
        //     // ... (kode yang sama dengan di atas)
        // }
    }
}
