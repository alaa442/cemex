<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contractors', function (Blueprint $table) {
            $table->increments('Contractor_Id');
            $table->string('Name', 150)->nullable(false);
            $table->string('Goverment', 100)->nullable(false);
            $table->string('City', 100)->nullable(false);
            $table->string('Adress', 150)->default(null);
            $table->enum('Education', ['No Education','Low Education','Medium Education','High Education']);
            $table->string('Facebook_Account', 150)->default(null);
            $table->enum('Computer', ['نعم','لا']);
            $table->string('Email', 150)->default(null);
            $table->date('Birthday');
            $table->integer('Tele1')->nullable(false);
            $table->integer('Tele2')->default(null);
            $table->string('Job', 100)->default(null);
            $table->string('Intership_No', 50)->default(null);
            $table->string('Type_Contractor', 50)->default(null);
            $table->string('Seller1', 50)->default(null);
            $table->string('Seller2', 50)->default(null);
            $table->string('Seller3', 50)->default(null);
            $table->string('Seller4', 50)->default(null);
            $table->enum('Phone_Type', ['نعم','لا']);
            $table->string('Nickname', 50)->default(null);
            //promoter id forign key

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('contractors');
    }
}
