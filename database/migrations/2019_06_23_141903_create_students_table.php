<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('studentName');
            $table->string('address');
            $table->string('gender');
            $table->string('studentImage');
            $table->string('fatherName');
            $table->string('motherName')->nullable();
            $table->integer('phoneNumber')->nullable();
            $table->integer('facultyId')->default('1');
            $table->integer('courseId')->default('2');
            $table->date('enrolledyear');
            $table->string('email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
