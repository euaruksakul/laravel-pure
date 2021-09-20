<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstrumentBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instrument_bookings', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('user_id'); 
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('instrument_id'); 
            $table->foreign('instrument_id')->references('id')->on('instruments');
            $table->unsignedBigInteger('project_id')->nullable(); 
            $table->foreign('project_id')->references('id')->on('projects');
            $table->date('booking_date');
            $table->string('booking_time_period');
            $table->string('booking_type');
            $table->datetime('finish_time')->nullable();
            $table->longText('usage_note')->nullable();
            $table->boolean('manager_ack_booking');
            $table->boolean('manager_ack_finish');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('instrument_bookings');
    }
}
