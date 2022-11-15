<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateQuotesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('state_quotes')->truncate();

        DB::table('state_quotes')->insert([
            'state' => 'PENDIENTE'
        ]);
        DB::table('state_quotes')->insert([
            'state' => 'ACEPTADA'
        ]);
        DB::table('state_quotes')->insert([
            'state' => 'RECHAZADA'
        ]);
        DB::table('state_quotes')->insert([
            'state' => 'FINALIZADA'
        ]);
    }
}
