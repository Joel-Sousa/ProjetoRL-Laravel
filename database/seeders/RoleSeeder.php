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
            (object) ['name' => 'Administrador'],
            (object) ['name' => 'Usuario'],
        ];

        foreach($data as $e){
            Role::create([
                'name' => $e->name,
            ]);
        }
    }
}
