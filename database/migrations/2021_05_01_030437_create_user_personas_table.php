<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_personas', function (Blueprint $table) {
            $table->increments('id_persona');
            $table->integer('id_project');
            $table->string('persona_name');
            $table->mediumText('avatar');
            $table->string('quote');
            $table->string('age');
            $table->string('work');
            $table->string('family');
            $table->string('location');
            $table->longText('bio');
            $table->string('goal');
            $table->string('frustation');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_personas');
    }
}
