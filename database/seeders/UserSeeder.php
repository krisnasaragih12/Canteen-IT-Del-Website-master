<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            [
                'username' => 'admin',
                'name' => 'Admin',
                'email' => 'admin@mail.com',
                'password' => Hash::make('password'),
                'phone' => '0',
                'role' => 'admin',
            ]
        );
        foreach ($data as $d) {
            User::create([
                'username' => $d['username'],
                'name' => $d['name'],
                'email' => $d['email'],
                'password' => $d['password'],
                'phone' => $d['phone'],
                'role' => $d['role'],
            ]);
        }
    }
}
