<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompetitionsAwardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competitions_awards', function (Blueprint $table) {
            $table->integer('Comp_Id')->unsigned();
            $table->integer('Awrd_Id')->unsigned();
            $table->foreign('Comp_Id')
                  ->references('Competitions_Id')->on('competitions')
                  ->onDelete('cascade')
                  ->onupdate('cascade');
            $table->foreign('Awrd_Id')
                  ->references('Awards_Id')->on('awards')
                  ->onDelete('cascade')
                  ->onupdate('cascade');
                 
                  $table->integer('Total_Count');
                   $table->timestamps();
                  $table->primary(['Comp_Id', 'Awrd_Id','Total_Count']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('competitions_awards');
    }
}
