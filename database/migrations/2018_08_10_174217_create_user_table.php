<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->increments('user_id');
            $table->string('user_img');
            $table->string('user_fname');
            $table->string('user_lname');
            $table->string('user_email');
            $table->string('user_password');
            $table->date('user_birthdate');
            $table->string('user_gender');
            $table->integer('course_qty_max');
            $table->integer('user_admin')->nullable();
            $table->integer('user_ban')->nullable();
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
        Schema::dropIfExists('user');
    }
}
