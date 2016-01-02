<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDepartmentColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subjects', function (Blueprint $table) {
            $table->integer('department_id')->unsigned()->nullable();
            $table->foreign('department_id')->references('id')->on('departments')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subjects', function (Blueprint $table) {
            $table->dropForeign('subjects_department_id_foreign');
            $table->dropColumn('department_id');
        });
    }
}
