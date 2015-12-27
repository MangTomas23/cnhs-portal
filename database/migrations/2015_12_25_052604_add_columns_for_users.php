<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsForUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('firstname');
            $table->string('middlename')->nullable();
            $table->string('lastname');
            $table->integer('year_level')->nullable();
            $table->string('gender');
            $table->date('birthdate');
            $table->string('address')->nullable();
            $table->string('contact')->nullable();
            $table->string('position')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('firstname');
            $table->dropColumn('middlename');
            $table->dropColumn('lastname');
            $table->dropColumn('year_level');
            $table->dropColumn('gender');
            $table->dropColumn('birthdate');
            $table->dropColumn('address');
            $table->dropColumn('contact');
            $table->dropColumn('position');
        });
    }
}
