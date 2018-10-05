<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Administrador',
                'email' => 'admin@admin.com',
                'username' => 'admin',
                'email_verified_at' => NULL,
                'password' => '$2y$10$t2g.YScPivXH5G35mZSXUulIdFAyhQ9G/W9On01HSokfJ8M.FNCp2',
                'remember_token' => 'fcZcljHxCXqBMF8mlWUp7HAcLmrtzVyfjDTDW0fHOBSXihrxG9KXn3Lxztsp',
                'created_at' => '2018-10-04 12:27:14',
                'updated_at' => '2018-10-04 12:40:48',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Moderador',
                'email' => 'moderador@mail.com',
                'username' => 'moderador',
                'email_verified_at' => NULL,
                'password' => '$2y$10$cPbb286FrriIHgGY520HhemKVmDXjFFszH9hFtYJ2S7fto4U06S7e',
                'remember_token' => NULL,
                'created_at' => '2018-10-04 12:42:45',
                'updated_at' => '2018-10-04 12:42:45',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Gerenciador de Conteúdos',
                'email' => 'gerenciador@mail.com',
                'username' => 'gerenciador',
                'email_verified_at' => NULL,
                'password' => '$2y$10$o9HIOJ8o5kTLA2BT3hhuLOj0535SWS.33RaBduOrXJMMLssgfjyaG',
                'remember_token' => NULL,
                'created_at' => '2018-10-04 12:43:08',
                'updated_at' => '2018-10-04 12:43:08',
            ),
            3 => 
            array (
                'id' => 5,
                'name' => 'Coletor',
                'email' => 'coletor@mail.com',
                'username' => 'coletor',
                'email_verified_at' => NULL,
                'password' => '$2y$10$qLiIrUy47pnWIQhuog8B/.pO0xfRK9v50y6t/ozD3hxF/v44QsC2e',
                'remember_token' => NULL,
                'created_at' => '2018-10-04 12:43:43',
                'updated_at' => '2018-10-04 12:43:43',
            ),
        ));
        
        
    }
}