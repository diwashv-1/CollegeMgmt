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
            $table->biginteger('faculty_id')->unsigned();
            $table->biginteger('course_id')->unsigned();
            $table->date('enrolledyear');
            $table->string('email');
            $table->string('enrolledDate')->nullable();



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
