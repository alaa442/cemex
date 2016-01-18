<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePormotersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pormoters', function (Blueprint $table) {
            $table->increments('Pormoter_Id');
            $table->string('Pormoter_Name',120);
            $table->integer('TelephonNo');
            $table->string('Government',150)->nullable();
            $table->string('City',150)->nullable();
            $table->string('Email',300)->nullable();
            $table->string('Facebook_Account',200)->nullable();
            $table->string('Instegram_Account',200)->nullable();
            $table->string('User_Name',120)->unique();
            $table->string('Password',100)->unique();
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
        Schema::drop('pormoters');
    }
}
