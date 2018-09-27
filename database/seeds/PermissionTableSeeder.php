<?php

use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions=[
            [
                'name' => 'role-read',
                'display_name' => 'Display Role Listing',
                'description' => 'See only Listing Of Role'
            ],
            [
                'name' => 'role-create',
                'display_name' => 'Create Role',
                'description' => 'Create New Role'
            ],
            [
                'name' => 'role-edit',
                'display_name' => 'Edit Role',
                'description' => 'Edit Role'
            ],
            [
                'name' => 'role-delete',
                'display_name' => 'Delete Role',
                'description' => 'Delete Role'
            ],
            [
                'name' => 'cadastrar-excsicata',
                'display_name' => 'Cadastrar exsicata',
                'description' => 'Permite cadastrar uma nova exsicata'
            ],
            [
                'name' => 'editar-exsicata',
                'display_name' => 'Editar exsicata',
                'description' => 'Permite editar uma exsicata'
            ],
            [
                'name' => 'deletar-exsicata',
                'display_name' => 'Deletar exsicata',
                'description' => 'Permite deletar exsicatas'
            ]
        ];
        foreach ($permissions as $key=>$value){
            \App\Permission::create($value);
        }
    }
}