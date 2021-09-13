<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leans', function (Blueprint $table) {
            $table->increments('id_lean');
            $table->integer('id_project');
            $table->string('lean_name');
            $table->string('problem')->nullable();
            $table->string('existing_alternative')->nullable();
            $table->string('solution')->nullable();
            $table->string('key_metric')->nullable();
            $table->string('unique_value')->nullable();
            $table->string('high_level_concept')->nullable();
            $table->string('unfair_advantage')->nullable();
            $table->string('channel')->nullable();
            $table->string('customer_segment')->nullable();
            $table->string('early_adopter')->nullable();
            $table->string('cost_structure')->nullable();
            $table->string('revenue_stream')->nullable();
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
        Schema::dropIfExists('leans');
    }
}
