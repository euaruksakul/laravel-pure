<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChemicalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chemicals', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('thainame')->nullable();
            $table->string('cas_number')->nullable();
            $table->integer('amount')->nullable();
            $table->string('amount_unit')->nullable();
            $table->string('brand')->nullable();
            $table->unsignedBigInteger('shelf_id')->nullable(); 
            //one-to-many relationship (one room has many equipment)
            $table->foreign('shelf_id')->references('id')->on('shelves');
            $table->float('price_per_unit')->nullable();
            $table->string('category1')->nullable();
            $table->string('category2')->nullable();
            $table->string('category3')->nullable();
            $table->longtext('description')->nullable();
            $table->string('image_path')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chemicals');
    }
}
