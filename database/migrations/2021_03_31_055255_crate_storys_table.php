<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrateStorysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('storys', function (Blueprint $table) {
            $table->increments('id_story');
            $table->integer('id_project');
            $table->string('story_name');
            $table->string('as_a')->nullable();
            $table->string('i_want')->nullable();
            $table->string('so_that')->nullable();
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
        Schema::dropIfExists('swots');
    }
}
