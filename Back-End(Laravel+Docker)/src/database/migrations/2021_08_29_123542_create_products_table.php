<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('status')->default(0)->unsigned();
            $table->foreignId('id_categories');
            $table->foreign('id_categories')->references('id')->on('categories');
            $table->string('name',100);
            $table->string('image');
            $table->text('description');
            $table->double('unit_price',15,2)->unsigned();
            $table->double('promotion_price',15,2)->unsigned()->default(0);
            $table->bigInteger('quantity')->unsigned();
            $table->bigInteger('view')->unsigned()->default(0);
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
        Schema::dropIfExists('products');
    }
}
