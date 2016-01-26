<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visits', function (Blueprint $table) {
            $table->increments('Visits_id');
            $table->string('Government',150)->nullable();
            $table->string('Adress',150)->nullable();
            $table->string('GPS',500)->nullable();
            $table->enum('Backcheck',['نعم', 'لا','متكرر','رقم خطأ','خطأ','أخرى']);
            $table->string('Comments',100)->nullable();
            $table->enum('Project_Type',['تجارى','سكنى','سكنى تجارى','بنية تحتية','مشاريع خدمية']);
            $table->string('Project_Current_State',300)->nullable();
            $table->enum('Cement_Type',['الفهد2','الجبس','اسمنت الصعيدى','اسمنت الفنار','اسمنت الفهد','اسمنت العادى','اسمنت لمهندس','اسمنت المقاوم','اسمنت الفهد2','اسمنت الفهد']);
            $table->integer('Cement_Quantity')->nullable();
            $table->enum('Visit_Reason',['أخرى','متابعة','تسويق','مبيعات']);
            $table->enum('Call_Reason',['تسويق','أخرى']);
            $table->date('Date_Visit_Call')->nullable();
            $table->integer('Points')->nullable();
            $table->integer('OrderNo')->nullable();
            $table->string('CV_Comments',500)->nullable();
            $table->string('Project_Type_Comments',500)->nullable();
            
            //$table->integer('Pormoter_Id')->unsigned();
            //$table->foreign('Pormoter_Id')->references('Pormoter_Id')->on('promoters')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('visits');
        Schema::drop('promoters');
    }
}
