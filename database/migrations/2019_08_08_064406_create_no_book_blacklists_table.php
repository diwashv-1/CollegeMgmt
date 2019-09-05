<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoBookBlacklistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('no_book_blacklists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->bigInteger('student_id')->unsigned()->nullable();
            $table->bigInteger('teacher_id')->unsigned()->nullable();
            $table->integer('countBook')->nullable();
            $table->string('blackList')->nullable();


            $table->foreign('student_id')->on('students')->references('id');
            $table->foreign('teacher_id')->on('staffs')->references('id');





        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('no_book_blacklists');
    }
}
