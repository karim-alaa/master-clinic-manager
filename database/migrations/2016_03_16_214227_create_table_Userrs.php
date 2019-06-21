<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUserrs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Userrs', function (Blueprint $table) {
            $table->increments('id');
             $table->string('name');
            $table->integer('nationality_id');
            $table->integer('role_id');
            $table->integer('is_male');
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
        Schema::drop('Userrs');
    }
}
