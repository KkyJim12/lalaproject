<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransferTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfer', function (Blueprint $table) {
            $table->increments('transfer_id');
            $table->integer('transfer_course_id');
            $table->integer('transfer_user_id');
            $table->string('transfer_user_name');
            $table->string('transfer_img');
            $table->string('transfer_course_name');
            $table->integer('transfer_course_price');
            $table->boolean('transfer_accept')->nullable();
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
        Schema::dropIfExists('transfer');
    }
}
