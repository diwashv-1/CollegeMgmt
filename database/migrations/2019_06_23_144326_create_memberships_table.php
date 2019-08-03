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
            $table->string('memberName');
            $table->string('type');
            $table->integer('studentId')->nullable();;
            $table->integer('teacheId')->nullable();;
            $table->string('address');
            $table->string('phoneNumber');
            $table->date('issuedDate');
            $table->date('expiryDate');
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
