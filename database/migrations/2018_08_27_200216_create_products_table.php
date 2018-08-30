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
            $table->increments('id');
            $table->text('photos');
            $table->string('name');
            $table->text('description');
            $table->text('composition');
            $table->float('price');
            $table->float('sale_price')->default(0);
            $table->integer('qty')->nullable();
            $table->string('address')->nullable();
            $table->integer('viewed')->default(0);

            $table->integer('shop_id')->unsigned();
            $table->foreign('shop_id')->references('id')->on('shops')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->integer('term_dispatch_id')->unsigned();
            $table->foreign('term_dispatch_id')->references('id')->on('term_dispatches')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
        });

        DB::statement('ALTER TABLE products ADD FULLTEXT search(name)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function($table) {$table->dropIndex('search');});
        Schema::dropIfExists('products');
    }
}
