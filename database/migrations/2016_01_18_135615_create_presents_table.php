<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePresentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presents', function (Blueprint $table) {
            $table->increments('Presents_Id');
            $table->timestamps();
            $table->date('Delivery_Date');
            $table->integer('Comp_Id')->unsigned();
            $table->foreign('Comp_Id')
                  ->references('Competitions_Id')->on('competitions')
                  ->onDelete('cascade')
                  ->onupdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('presents');
    }
}
