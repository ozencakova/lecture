<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLecturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lectures', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('classroom_id');
            $table->unsignedInteger('faculty_member_id');
            $table->string('code', 45)->unique();
            $table->string('name', 50);
            $table->boolean('is_mandatory')->default(1);
            $table->smallInteger('day');
            $table->string('time', 10);
            $table->timestamps();


        });

        Schema::table('lectures', function(Blueprint $table){
            $table->foreign('classroom_id')->references('id')->on('classrooms')->onDelete('cascade');
            $table->foreign('faculty_member_id')->references('id')->on('faculty_members')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('lectures');
    }
}






