<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'lista-papel',
                'display_name' => 'Listar papéis',
                'description' => 'Somente permite listar os papéis',
                'created_at' => '2018-10-04 12:27:14',
                'updated_at' => '2018-10-04 12:27:14',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'cria-papel',
                'display_name' => 'Criar papel',
                'description' => 'Permite criar papéis',
                'created_at' => '2018-10-04 12:27:14',
                'updated_at' => '2018-10-04 12:27:14',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'edita-papel',
                'display_name' => 'Editar papel',
                'description' => 'Permite editar papéis',
                'created_at' => '2018-10-04 12:27:14',
                'updated_at' => '2018-10-04 12:27:14',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'deleta-papel',
                'display_name' => 'Deletar papel',
                'description' => 'Permite deletar papéis',
                'created_at' => '2018-10-04 12:27:14',
                'updated_at' => '2018-10-04 12:27:14',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'cadastrar-excsicata',
                'display_name' => 'Cadastrar exsicata',
                'description' => 'Permite cadastrar uma nova exsicata',
                'created_at' => '2018-10-04 12:27:14',
                'updated_at' => '2018-10-04 12:27:14',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'editar-exsicata',
                'display_name' => 'Editar exsicata',
                'description' => 'Permite editar uma exsicata',
                'created_at' => '2018-10-04 12:27:14',
                'updated_at' => '2018-10-04 12:27:14',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'deletar-exsicata',
                'display_name' => 'Deletar exsicata',
                'description' => 'Permite deletar exsicatas',
                'created_at' => '2018-10-04 12:27:14',
                'updated_at' => '2018-10-04 12:27:14',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'cadastra-usuario',
                'display_name' => 'Cadastrar usuário',
                'description' => 'Permite cadastrar um novo usuário no sistema',
                'created_at' => '2018-10-04 12:31:33',
                'updated_at' => '2018-10-04 12:32:08',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'edita-usuario',
                'display_name' => 'Editar usuário',
                'description' => 'Permite editar um usuário do sistema',
                'created_at' => '2018-10-04 12:32:01',
                'updated_at' => '2018-10-04 12:32:01',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'deleta-usuario',
                'display_name' => 'Deletar usuário',
                'description' => 'Permite deletar um usuário do sistema',
                'created_at' => '2018-10-04 12:32:27',
                'updated_at' => '2018-10-04 12:32:27',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'lista-usuario',
                'display_name' => 'Listar usuários',
                'description' => 'Permite listar os usuários do sistema',
                'created_at' => '2018-10-04 12:32:49',
                'updated_at' => '2018-10-04 12:32:49',
            ),
        ));
        
        
    }
}