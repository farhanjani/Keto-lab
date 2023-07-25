<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id')->unsigned()->default(0);
            $table->integer('crm_id')->unsigned()->default(0);
            $table->text('title');
            $table->longText('description')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->tinyInteger('is_featured')->default(0)->comment('0=Not Featured, 1=Featured');
            $table->integer('discount')->unsigned()->nullable();
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
        Schema::dropIfExists('offers');
    }
}
