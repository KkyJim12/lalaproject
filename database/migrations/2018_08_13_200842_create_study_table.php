<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('study', function (Blueprint $table) {
            $table->increments('study_id');
            $table->integer('user_id');
            $table->string('user_img');
            $table->string('user_fname');
            $table->string('user_lname');
            $table->string('user_email');
            $table->date('user_birthdate');
            $table->string('user_gender');
            $table->integer('course_id');
            $table->boolean('study_status')->nullable();
            $table->boolean('study_approve')->nullable();
            $table->string('course_img');
            $table->string('course_name');
            $table->integer('course_price');
            $table->integer('course_now_joining');
            $table->integer('course_max');
            $table->date('course_start_date');
            $table->date('course_end_date');
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
        Schema::dropIfExists('study');
    }
}
