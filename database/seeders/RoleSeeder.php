<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            (object) ['nome' => 'Administrador'],
            (object) ['nome' => 'Usuario'],
        ];

        foreach($data as $e){
            Role::create([
                'nome' => $e->nome,
            ]);
        }
    }
}
