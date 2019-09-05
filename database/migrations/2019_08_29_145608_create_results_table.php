<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('student_id')->unsigned();
            $table->bigInteger('exam_id')->unsigned();
            $table->string('totalQsn')->nullable();
            $table->string('nonAttemptQsn')->nullable();
            $table->string('correct')->nullable();
            $table->string('wrong')->nullable();
            $table->timestamps();
            $table->foreign('student_id')->on('students')->references('id')->onDelete('cascade');
            $table->foreign('exam_id')->on('exams')->references('id')->onDelete('cascade');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('results');
    }
}
