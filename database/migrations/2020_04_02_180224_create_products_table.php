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
            $table->id();
            $table->string('name',100)->nullable();
            $table->string('SKU',50)->nullable();
            $table->integer('category_id')->nullable();

            $table->float('weight',8,2)->nullable();
            $table->string('desc')->nullable();
            $table->string('thump',100)->nullable();
            $table->string('image',100)->nullable();
            $table->boolean('IsApproved');
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
