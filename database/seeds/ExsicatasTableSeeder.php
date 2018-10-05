<?php

use Illuminate\Database\Seeder;

class ExsicatasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('exsicatas')->delete();
        
        \DB::table('exsicatas')->insert(array (
            0 => 
            array (
                'id' => 1,
                'numero' => 123,
                'name' => 'Teste',
                'autor' => NULL,
                'escaninho' => NULL,
                'coletor' => 'Teste',
                'data' => '04/10/2018',
                'determinador' => NULL,
                'quantidade' => NULL,
                'bdd' => NULL,
                'image' => NULL,
                'genero_id' => 1,
                'epiteto_id' => 1,
                'familia_id' => 1,
                'deleted_at' => NULL,
                'created_at' => '2018-10-04 12:45:48',
                'updated_at' => '2018-10-04 12:45:48',
            ),
        ));
        
        
    }
}