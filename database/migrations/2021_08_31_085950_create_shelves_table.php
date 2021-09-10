<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShelvesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shelves', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('shelf_code');
            $table->longtext('description')->nullable();
            $table->unsignedBigInteger('room_id')->nullable(); 
            $table->foreign('room_id')->references('id')->on('rooms');
            $table->float('location_x')->nullable();
            $table->float('location_y')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shelves');
    }
}
