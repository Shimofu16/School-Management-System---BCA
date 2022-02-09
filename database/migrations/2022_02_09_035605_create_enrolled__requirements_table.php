<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnrolledRequirementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrolled_requirements', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('student_id')->nullable();
            $table->foreign('student_id')
                ->references('id')
                ->on('enrolled_students')
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
        Schema::dropIfExists('enrolled_requirements');
    }
}
