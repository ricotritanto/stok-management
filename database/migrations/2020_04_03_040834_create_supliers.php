<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupliers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supliers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('suplier_name');
            $table->String('email')->nullable();
            $table->String('address');
            $table->String('suplier_code');
            $table->String('phone');
            $table->String('city');
            $table->String('postal_code');
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
        Schema::dropIfExists('supliers');
    }
}
