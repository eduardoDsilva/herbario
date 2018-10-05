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
                'name' => 'lista-papel',
                'display_name' => 'Listar papéis',
                'description' => 'Somente permite listar os papéis'
            ],
            [
                'name' => 'cria-papel',
                'display_name' => 'Criar papel',
                'description' => 'Permite criar papéis'
            ],
            [
                'name' => 'edita-papel',
                'display_name' => 'Editar papel',
                'description' => 'Permite editar papéis'
            ],
            [
                'name' => 'deleta-papel',
                'display_name' => 'Deletar papel',
                'description' => 'Permite deletar papéis'
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