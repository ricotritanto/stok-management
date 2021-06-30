<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            /** script original auth
             * $table->increments('id');
             * $table->string('name');
             * $table->string('email');
             * $table->string('password');
             * $table->rememberToken();
             * $table->timestamps();
             */

            $table->id('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('level');
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => 'admin',
            'level' => 'admin',
        ]);

        DB::table('users')->insert([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => 'user',
            'level' => 'user',
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
