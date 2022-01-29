<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamiliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('families', function (Blueprint $table) {
            $table->increments('id');
            $table->string('student_lrn');/* ilalagay dito yung student lrn */ /* then mag condition nalang for view ng family and guardian */
            $table->string('father_name')->nullable();
            $table->date('father_birthdate')->useCurrent()->nullable();
            $table->string('father_landline', 20)->nullable();
            $table->string('father_email')->nullable();
            $table->string('father_occupation')->nullable();
            $table->string('father_office_address')->nullable();
            $table->string('father_contact', 11)->nullable();
            $table->string('mother_name')->nullable();
            $table->date('mother_birthdate')->useCurrent()->nullable();
            $table->string('mother_landline', 20)->nullable();
            $table->string('mother_email')->nullable();
            $table->string('mother_occupation')->nullable();
            $table->string('mother_office_address')->nullable();
            $table->string('mother_contact', 11)->nullable();
            $table->string('guardian_name');
            $table->date('guardian_birthdate')->useCurrent();
            $table->string('guardian_landline', 20);
            $table->string('guardian_contact', 11);
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
        Schema::dropIfExists('families');
    }
}
