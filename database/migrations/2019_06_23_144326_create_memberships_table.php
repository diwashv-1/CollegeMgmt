<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembershipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memberships', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->bigInteger('studentId')->unsigned()->nullable();
            $table->bigInteger('teacheId')->unsigned()->nullable();
            $table->date('issuedDate');
            $table->date('expiryDate');


            //Added
            $table->foreign('studentId')->on('students')->references('id')->onDelete('cascade');
            $table->foreign('teacheId')->on('staffs')->references('id')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('memberships');
    }
}
