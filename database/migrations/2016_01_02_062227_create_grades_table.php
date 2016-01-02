<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grades', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')
            ->onDelete('cascade');
            $table->integer('teacher_id')->unsigned();
            $table->foreign('teacher_id')->references('id')->on('users')
            ->onDelete('cascade');
            $table->integer('subject_id')->unsigned();
            $table->foreign('subject_id')->references('id')->on('subjects')
            ->onDelete('cascade');
            $table->decimal('q1')->nullable();
            $table->decimal('q2')->nullable();
            $table->decimal('q3')->nullable();
            $table->decimal('q4')->nullable();
            $table->decimal('average')->nullable();
            $table->string('school_year');
            $table->integer('approved_status');
        });
    }

    /**
     * Reverse the migrations.  
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('grades');
    }
}
