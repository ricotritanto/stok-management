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
        Schema::create('products', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('serial');
            $table->string('product_name');
            $table->integer('category_id');
            $table->integer('brand_id');
            $table->integer('purchase_price');
            $table->integer('sell_price');
            $table->string('stocks');
            $table->text('description')->nullabel();
            $table->string('product_kode');
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
