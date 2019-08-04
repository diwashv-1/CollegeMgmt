<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staffs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('staffName');
            $table->string('staffGender');
            $table->string('staffAddress');
            $table->string('staffImage');
            $table->integer('contactNumber');
            $table->string('enrolledYear');
            $table->integer('roleId');
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
        Schema::dropIfExists('staffs');
    }
}
