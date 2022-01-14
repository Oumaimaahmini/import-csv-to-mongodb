<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupermarketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supermarkets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Invoice ID');
            $table->string('Branch');
            $table->string('City');
            $table->string('Customer type');
            $table->string('Gender');
            $table->string('Product line');
            $table->float('Unit price'); 
            $table->float('Quantity');
            $table->float('Tax 5%'); 
            $table->float('Total');
            $table->date('Date');
            $table->dateTime('Time'); 
            $table->string('Payment');
            $table->float('cogs');  
            $table->float('gross margin percentage');  
            $table->float('gross income');  
            $table->float('Rating'); 
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
        Schema::dropIfExists('supermarkets');
    }
}
