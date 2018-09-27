<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username'=>'eduardo',
            'name'=>'Eduardo da Silva',
            'email'=>'eduardo.2599@gmail.com',
            'password'=> Hash::make('123456')
        ]);
    }
}