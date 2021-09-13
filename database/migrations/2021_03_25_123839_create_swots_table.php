<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSwotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('swots', function (Blueprint $table) {
            $table->increments('id_swot');
            $table->integer('id_project');
            $table->string('swot_name');
            $table->string('strength')->nullable();
            $table->string('weakness')->nullable();
            $table->string('opportunity')->nullable();
            $table->string('threat')->nullable();
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
