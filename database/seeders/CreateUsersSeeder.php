<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Carbon\Carbon;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $id_petugas = uniqid();
        $users = [
            [
                'id_petugas' => 'ADMIN',
                'nama' => 'Admin',
                'username' => 'admin',
                'type' => '1',
                'last_seen' => Carbon::now(),
                'telp' => '0896374678422',
                'password' => bcrypt('admin123'),
            ],
            [
                'id_petugas' => $id_petugas,
                'nama' => 'Rendi',
                'username' => 'petugas',
                'type' => '2',
                'last_seen' => Carbon::now(),
                'telp' => '0896374678444',
                'password' => bcrypt('petugas123'),
            ],
            [
                'nik' => 2407859387834982,
                'nama' => 'user',
                'type' => '0',
                'last_seen' => Carbon::now(),
                'username' => 'user',
                'telp' => '0896396784255',
                'password' => bcrypt('user123'),
            ],
        ];

        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
