<?php

use Illuminate\Database\Seeder;

class InsertUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('bs_user')->insert([
            'username'=>'zoul'
        ]);
        DB::table('bs_user')->insert([
            'username'=>'zouli'
        ]);
        DB::table('bs_user')->insert([
            'username'=>'zoulie'
        ]);
    }
}
