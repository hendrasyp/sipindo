<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User_model;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        User_model::create([
            'id_user' => 90,
            'nama' => "admin nih",
            'email' => "adminsipindo@sipindo.com",
            'username' => "adminsipindo",
            'password' => "5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8",
            'akses_level' => 'Admin',
            'kode_rahasia' => 'admin',
            'tanggal' => $now
        ]);
    }
}
