<?php

namespace Database\Seeders;

use App\Models\UserData;
use Illuminate\Database\Seeder;

class UserDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            (object) ['name' => 'Admin'],
            (object)['name' => 'Usuario'],
         ];
 
 
         foreach($data as $i => $e){
             UserData::create([
                 'name' => $e->name,
                 'users_id' => ($i+1)
             ]);
         }
    }
}
