<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnrolledStudentFamiliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrolled_student_families', function (Blueprint $table) {
            $table->increments('id');
            $table->string('student_lrn')->nullable();
            /* $table->unsignedBigInteger('student_id')->nullable();
            $table->foreign('student_id')
                ->references('id')
                ->on('enrolled_students')
                ->onDelete('restrict')->onUpdate('cascade'); */
            $table->string('name')->nullable();
            $table->date('birthdate')->useCurrent()->nullable();
            $table->string('landline', 20)->nullable();
            $table->string('contact_no', 11)->nullable();
            $table->string('email')->nullable();
            $table->string('occupation')->nullable();
            $table->string('office_address')->nullable();
            $table->string('office_contact_no', 11)->nullable();
            $table->string('relationship')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enrolled_student_families');
    }
}
