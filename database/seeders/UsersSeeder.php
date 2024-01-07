<?php

namespace Database\Seeders;

use App\Models\Users;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Users::create ([
            'name' => 'Admin',
            'email' => 'administrator@gmail.com',
            'password' => Hash::make('adminkesiswaan'),
            'role' => 'admin',
        ]);

        // $data = [
        //     'name' => 'Pembimbing Siswa',
        //     'email' => 'pembimbingsiswa@gmail.com',
        //     'password' => Hash::make('pembimbingsiswa'),
        //     'role' => 'pembimbing_siswa',
        // ];

        // Users::insert($data);
    }
}
