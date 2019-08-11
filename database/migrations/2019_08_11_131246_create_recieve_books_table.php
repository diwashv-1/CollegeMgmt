<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecieveBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recieve_books', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('issue_id')->unsigned();
            $table->string('returnedDate');

            $table->foreign('issue_id')->references('id')->on('issued_books')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recieve_books');
    }
}
