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
        
    }
}
