<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Here it creates a Product table to be created when the DBMigrate command is run
        // the ones that follow in the command are the columns
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id'); //ID as primary key
            $table->string('product_name');//title column
            $table->mediumText('product_desc');//description of product 
            $table->timestamps();//two columns; created at and updated at when making changes to a product or create
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
