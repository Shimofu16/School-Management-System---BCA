<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnrolleeRequirementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrollee_requirements', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('student_id')->nullable();
            $table->foreign('student_id')
                ->references('id')
                ->on('enrollees')
                ->onDelete('restrict')->onUpdate('cascade');
            $table->string('filename')->nullable();
            $table->string('filepath')->nullable();
            $table->boolean('isSubmitted')->default(0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enrollee_requirements');
    }
}
