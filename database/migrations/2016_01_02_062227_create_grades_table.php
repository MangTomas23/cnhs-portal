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
            $table->integer('subject_id')->unsigned();
            $table->foreign('subject_id')->references('id')->on('subjects')
            ->onDelete('cascade');
            $table->decimal('1st_quarter')->nullable();
            $table->decimal('2nd_quarter')->nullable();
            $table->decimal('3rd_quarter')->nullable();
            $table->decimal('4th_quarter')->nullable();
            $table->decimal('average')->nullable();
            $table->string('school_year');
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
