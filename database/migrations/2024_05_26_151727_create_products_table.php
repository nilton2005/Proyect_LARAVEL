<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');
            // Estado del producto 1: Activo, 2: Inactivo
            $table->integer('status');
            $table->string('name');
            $table->string('slug');
            $table->integer('category_ID');
            $table->string('image');
            $table->decimal('price', 10, 2);
            $table->integer('in_discount' );
            $table->decimal('discount', 10, 2);
            $table->text('content');
            $table->softDeletes();
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
