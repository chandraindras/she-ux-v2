<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectStatementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_statements', function (Blueprint $table) {
            $table->increments('id_project_statement');
            $table->integer('id_project');
            $table->string('project_statement_name');
            $table->string('project_sponsor')->nullable();
            $table->string('project_manager')->nullable();
            $table->string('date_approval')->nullable();
            $table->string('date_revisian')->nullable();
            $table->string('scope')->nullable();
            $table->string('deliverable')->nullable();
            $table->string('acceptance')->nullable();
            $table->string('constraint')->nullable();
            $table->string('assumption')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_statements');
    }
}
