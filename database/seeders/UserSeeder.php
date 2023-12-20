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
        $data = [
            (object) ['email' => 'admin@email.com', 'password' => Hash::make('123123123')],
            (object) ['email' => 'usuario@email.com', 'password' => Hash::make('123123123')],
        ];

        foreach($data as $i => $e){
            User::create([
                'email' => $e->email,
                'password' => $e->password,
                'idRole' => ($i+1)
            ]);
        }
    }
}
