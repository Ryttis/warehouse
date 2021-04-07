<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuantitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quantities', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('quantity');
            $table->bigInteger('product_id')->unsigned();
            $table->timestamps();
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quantities');
    }
}
