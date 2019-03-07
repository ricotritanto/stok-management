<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationshipsToProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product', function (Blueprint $table) {
            $table->foreign('category_id')->references('category_id')->on('category')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('brand_id')->references('brand_id')->on('brand')
            ->onUpdate('cascade')->onDelete('cascade');
        });
            

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product', function (Blueprint $table) {
            $table->dropForeign('product_category_id_foreign');
            $table->dropForeign('product_brand_id_foreign');
        });

        Schema::table('product', function(Blueprint $table) {
            $table->integer('category_id')->change();
        });

        Schema::table('product', function(Blueprint $table) {
            $table->integer('brand_id')->change();
        });
    }
}
