<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationshipsToPurchaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('purchase', function (Blueprint $table) {
            $table->foreign('suplier_id')->references('id')->on('supliers')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('purchase_detail_id')->references('id')->on('purchase_detail')
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
        // Schema::table('purchase', function (Blueprint $table) {
        //     //
        // });
    }
}
