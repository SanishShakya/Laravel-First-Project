<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('roles')->insert([
            'name' => 'Super Admin',
            'created_by' => 2,
            'updated_by' => 2,
            'status' => 1,
        ]);
    }
}
