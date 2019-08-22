<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectStaffs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject_staffs', function (Blueprint $table) {
            $table->bigInteger('staffs_id')->unsigned();
            $table->foreign('staffs_id')->on('staffs')->references('id')->onDelete('cascade');


            $table->bigInteger('subject_id')->unsigned();
            $table->foreign('subject_id')->on('subjects')->references('id')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subject_staffs');
    }
}
