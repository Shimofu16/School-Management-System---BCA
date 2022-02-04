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
            $table->string('student_lrn')->nullable();/* ilalagay dito yung student lrn */ /* then mag condition nalang for view ng family and guardian */
            $table->string('name')->nullable();
            $table->date('birthdate')->useCurrent()->nullable();
            $table->string('landline', 20)->nullable();
            $table->string('contact_no', 11)->nullable();
            $table->string('email')->nullable();
            $table->string('occupation')->nullable();
            $table->string('office_address')->nullable();
            $table->string('office_contact_no', 11)->nullable();
            $table->string('relationship')->nullable();
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
