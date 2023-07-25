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
            $table->integer('campaign_id')->unsigned()->default(0);
            $table->integer('category_id')->unsigned()->default(0);
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->longText('description')->nullable();
            $table->longText('product_features')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->string('logo')->nullable();
            $table->string('image')->nullable();
            $table->integer('discount')->unsigned()->nullable();
            $table->integer('template')->unsigned()->default(1);
            $table->tinyInteger('is_deleted')->default(0)->comment('0=Not Deleted, 1=Deleted');
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
