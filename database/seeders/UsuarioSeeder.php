<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            (object) ['nome' => 'Admin'],
            (object)['nome' => 'Usuario'],
         ];
 
 
         foreach($data as $i => $e){
             Usuario::create([
                 'nome' => $e->nome,
                 'idUser' => ($i+1)
             ]);
         }
    }
}
