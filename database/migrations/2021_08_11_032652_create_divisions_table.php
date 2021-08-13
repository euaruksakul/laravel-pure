<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDivisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('divisions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('division_name');
            $table->unsignedBigInteger('division_head_id');
            $table->unsignedBigInteger('department_id');

            $table->foreign('division_head_id')->references('id')->on('users');
            $table->foreign('department_id')->references('id')->on('departments');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('divisions');
    }
}
