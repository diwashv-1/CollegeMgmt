<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookQuantitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_quantities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table-> bigInteger('book_id')->unsigned();
            $table-> integer('quantity');

            //Added
                $table->foreign('book_id')->on('books')->references('id')->onDelete('cascade');

        });
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_quantities');
    }
}
