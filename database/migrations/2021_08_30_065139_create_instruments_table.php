<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstrumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instruments', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('thainame')->nullable();
            $table->unsignedBigInteger('manager_id')->nullable(); 
            //one-to-many relationship (one person can manage many equipment)
            $table->foreign('manager_id')->references('id')->on('users');
            $table->unsignedBigInteger('room_id')->nullable(); 
            //one-to-many relationship (one room has many equipment)
            $table->foreign('room_id')->references('id')->on('rooms');
            $table->unsignedBigInteger('division_id')->nullable(); 
            //one-to-many relationship (one division has many equipment)
            $table->foreign('division_id')->references('id')->on('divisions');
            $table->string('item_number')->nullable(); //เลขครุภัณฑ์
            $table->string('running_status')->nullable(); //installation,commissioning,running,under maintenance,out of order
            $table->boolean('ready');
            $table->string('image_path')->nullable();
            $table->float('cost_per_hr')->nullable();
            $table->string('category1')->nullable();
            $table->string('category2')->nullable();
            $table->string('category3')->nullable();
            $table->longtext('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('instruments');
    }
}
