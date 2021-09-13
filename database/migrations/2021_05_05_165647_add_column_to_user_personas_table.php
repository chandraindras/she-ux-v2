<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToUserPersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_personas', function (Blueprint $table) {
            $table->string('media');
            $table->string('device');
            $table->string('fear');
            $table->string('achievement');
            $table->string('growth');
            $table->string('power');
            $table->string('social');
            $table->string('personality');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_personas', function (Blueprint $table) {
            //
        });
    }
}
