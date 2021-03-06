<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
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
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('surname')->nullable();
            $table->string('patronymic')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('password')->default(str_random(10));
            $table->boolean('is_activate')->default(false);
            $table->string('activation_hash')->nullable();
            $table->string('username')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('index')->nullable();
            $table->boolean('sex')->default(true);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
