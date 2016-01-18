<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePresentsAwardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presents_awards', function (Blueprint $table) {
            $table->integer('Present_Id')->unsigned();
            $table->integer('Awrd_Id')->unsigned();

            $table->foreign('Present_Id')
                  ->references('Presents_Id')->on('presents')
                  ->onDelete('cascade')
                  ->onupdate('cascade');
            $table->foreign('Awrd_Id')
                  ->references('Awards_Id')->on('awards')
                  ->onDelete('cascade')
                  ->onupdate('cascade');
                 
                  $table->integer('Count');
                   $table->timestamps();
                  $table->primary(['Present_Id', 'Awrd_Id','Count']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('presents_awards');
    }
}
