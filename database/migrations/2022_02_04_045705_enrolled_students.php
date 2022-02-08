<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EnrolledStudents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrolled_students', function (Blueprint $table) {
            $table->id();
            /* $table->increments('id'); */
            $table->string('student_lrn', 12)->unique();
            $table->string('last_name');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('ext_name')->nullable();
            $table->string('gender', 5);
            $table->integer('age');
            $table->string('email')->unique();
            $table->date('birthdate')->useCurrent();
            $table->string('birthplace');
            $table->string('address');
            $table->unsignedBigInteger('section_id');
            $table->foreign('section_id')
                ->references('id')
                ->on('sections')
                ->onDelete('restrict')->onUpdate('cascade');
            $table->unsignedBigInteger('grade_level_id');
            $table->foreign('grade_level_id')
                ->references('id')
                ->on('grade_levels')
                ->onDelete('restrict')->onUpdate('cascade');
            $table->unsignedBigInteger('sy_id');
            $table->foreign('sy_id')
                ->references('id')
                ->on('school_years')
                ->onDelete('restrict')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enrolled_students');
    }
}
