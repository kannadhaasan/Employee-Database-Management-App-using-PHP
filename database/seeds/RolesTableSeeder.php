<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('roles')->insert([
            'name' => 'admin',
            'created_at' => Carbon::now(),
        ]);

           DB::table('roles')->insert([
            'name' => 'user',
            'created_at' => Carbon::now(),   
        ]);
    }
}
