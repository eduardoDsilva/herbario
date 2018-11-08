<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(GenerosTableSeeder::class);
        $this->call(EpitetosTableSeeder::class);
        $this->call(FamiliasTableSeeder::class);
        $this->call(ExsicatasTableSeeder::class);
        $this->call(EnderecosTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(RoleUserTableSeeder::class);
        $this->call(PermissionRoleTableSeeder::class);
    }
}
