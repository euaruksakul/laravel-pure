<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('thai_firstname')->nullable();;
            $table->string('thai_lastname')->nullable();;
            $table->string('nickname')->nullable();;
            $table->string('phone_number')->nullable();;
            $table->string('affiliation')->nullable();;
            $table->string('address')->nullable();;
            $table->date('date_of_birth')->nullable();;
            $table->string('blood_type')->nullable();;
            $table->string('status')->nullable();;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_details');
    }
}
