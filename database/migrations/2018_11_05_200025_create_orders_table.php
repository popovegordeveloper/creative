<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->integer('shop_id')->unsigned();
            $table->foreign('shop_id')->references('id')->on('shops')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->integer('status_id')->unsigned()->default(1);
            $table->foreign('status_id')->references('id')->on('statuses')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->string('address')->nullable();
            $table->string('price');
            $table->string('delivery_price')->nullable();
            $table->text('product');
            $table->text('cancel')->nullable();

            $table->text('comment')->nullable();
            $table->boolean('is_new')->default(true);

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
        Schema::dropIfExists('orders');
    }
}
