<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'admin',
                'display_name' => 'Administrador',
                'description' => 'Administrador geral do sistema. Possuí totais permissões.',
                'created_at' => '2018-10-04 12:29:41',
                'updated_at' => '2018-10-04 12:36:49',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'moderador',
                'display_name' => 'Moderador',
                'description' => 'O moderador pode visualizar e cadastrar usuários. Também pode cadastrar, editar e deletar exsicatas do sistema.',
                'created_at' => '2018-10-04 12:35:29',
                'updated_at' => '2018-10-04 12:38:32',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'gerenciador',
                'display_name' => 'Gerenciador de conteúdos',
                'description' => 'O gerenciador de conteúdos pode somente cadastrar, editar e deletar as exsicatas do sistema.',
                'created_at' => '2018-10-04 12:36:33',
                'updated_at' => '2018-10-04 12:36:33',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'coletor',
                'display_name' => 'Coletor',
                'description' => 'O coletor do herbário municipal somente pode adicionar novas exsicatas ao sistema. Porém, não pode deletar ou editar as já existentes.',
                'created_at' => '2018-10-04 12:37:46',
                'updated_at' => '2018-10-04 12:38:16',
            ),
        ));
        
        
    }
}