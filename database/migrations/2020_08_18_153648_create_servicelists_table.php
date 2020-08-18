<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicelistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicelists', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('serv_cate_id');
            $table->string('title');
            $table->longText('description');
            $table->string('duration');
            $table->string('price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('servicelists');
    }
}
