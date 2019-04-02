<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationshipsToPurchaseDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('purchase_detail', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('product')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        
            $table->foreign('purchase_id')->references('id')->on('purchase')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('purchase_detail', function (Blueprint $table) {
            //
        });
    }
}
