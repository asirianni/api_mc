<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AddCamposToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            DB::statement('ALTER TABLE users ADD surname varchar(255) AFTER password');
            DB::statement('ALTER TABLE users ADD id_type int(11) AFTER surname');
            DB::statement('ALTER TABLE users ADD birth date AFTER id_type');
            DB::statement('ALTER TABLE users ADD id_activitie int(11) AFTER birth');
            DB::statement('ALTER TABLE users ADD address varchar(255) AFTER id_activitie');
            DB::statement('ALTER TABLE users ADD location varchar(255) AFTER address');
            DB::statement('ALTER TABLE users ADD province varchar(255) AFTER location');
            DB::statement('ALTER TABLE users ADD country varchar(255) AFTER province');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn("id_type");
            $table->dropColumn("surname");
            $table->dropColumn("birth");
            $table->dropColumn("id_activitie");
            $table->dropColumn("address");
            $table->dropColumn("location");
            $table->dropColumn("province");
            $table->dropColumn("country");
        });
    }
}
