<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIssuingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issuings', function (Blueprint $table) {
            $table->increments('id');
            $table->String('issuing_facture');
            $table->String('date');
            $table->unsignedInteger('customer_id');
            $table->string('bayar');
            $table->string('kembali');
            $table->string('grandtotal');
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
        Schema::dropIfExists('issuings');
    }
}
