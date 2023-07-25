<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUpsellAssignedProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upsell_assigned_products', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id')->nullable;
            $table->integer('upsell_product_id')->nullable;
            $table->integer('upsell_key')->nullable;
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
        Schema::dropIfExists('upsell_assigned_products');
    }
}
