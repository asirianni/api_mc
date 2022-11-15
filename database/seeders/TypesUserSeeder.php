<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypesUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('types_user')->truncate();

        DB::table('types_user')->insert([
            'type' => 'Profesionales'
        ]);
        DB::table('types_user')->insert([
            'type' => 'Visitas'
        ]);
    }
}
