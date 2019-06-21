<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableClinicEmployees extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clinic_employees', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('clinic_id');
            $table->integer('employee_id');
            $table->datetime('employment_date');
            $table->datetime('sack_date');
            $table->integer('is_active');
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
        Schema::drop('clinic_employees');
    }
}
