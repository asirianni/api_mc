<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActivitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('activities')->truncate();

        DB::table('activities')->insert([
            'activitie' => 'jardinero'
        ]);
        DB::table('activities')->insert([
            'activitie' => 'plomero'
        ]);
        DB::table('activities')->insert([
            'activitie' => 'mecanico'
        ]);
    }
}
