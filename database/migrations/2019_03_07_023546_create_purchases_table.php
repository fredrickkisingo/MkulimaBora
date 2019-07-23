<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id');
            $table->string('session_id')->default( '0' );
            $table->string('product_name'); //title column
            $table->mediumText('product_desc');//description of product
            $table->integer('user_id');
            $table->integer('qty')->default( 0 );
            $table->integer('price');
            $table->string('location');//location column
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
        Schema::dropIfExists('purchases');
    }
}
