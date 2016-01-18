<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractorsReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contractors_reviews', function (Blueprint $table) {

            $table->integer('Contractor_Id')->unsigned();
            $table->foreign('Contractor_Id')->references('Contractor_Id')->on('contractors')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('Review_Id')->unsigned();
            $table->foreign('Review_Id')->references('Review_Id')->on('reviews')->onDelete('cascade')->onUpdate('cascade');

            $table->primary(['Contractor_Id', 'Review_Id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('contractors_reviews');
    }
}
