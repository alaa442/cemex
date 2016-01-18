<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->increments('Review_Id');
            $table->string('GPS', 500)->default(null);
            $table->integer('Project_NO')->default(null);
            $table->integer('Cement_Consuption')->default(null);
            $table->integer('Cement_Bricks')->default(null);
            $table->integer('Steel_Consumption')->default(null);
            $table->integer('Wood_Meters')->default(null);
            $table->integer('Wood_Consumption')->default(null);
            $table->integer('No_Of_Mixers')->default(null);
            $table->string('Capital', 150)->default(null);
            $table->enum('Credit_Debit', ['كاش', 'اجل','كاش واجل','مستخلصات حكومية']);
            $table->string('Sub_Contractor', 150)->default(null);
            $table->enum('Class', ['1','2','3','4','5','6','7']);
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('reviews');
    }
}
