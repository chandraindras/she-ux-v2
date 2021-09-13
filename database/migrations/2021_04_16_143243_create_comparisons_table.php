<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComparisonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comparisons', function (Blueprint $table) {
            $table->increments('id_comparison');
            $table->integer('id_project');
            $table->string('comparison_name');
            $table->string('aspect')->nullable();
            $table->string('competitor1')->nullable();
            $table->string('competitor2')->nullable();
            $table->string('competitor3')->nullable();
            $table->string('competitor4')->nullable();
            $table->string('competitor5')->nullable();
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
        Schema::dropIfExists('comparisons');
    }
}
