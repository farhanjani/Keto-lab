<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_reviews', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id')->unsigned();
            $table->string('customer_name', 100);
            $table->string('customer_country', 100);
            $table->string('customer_photo')->nullable();
            $table->longText('customer_review');
            $table->dateTime('purchase_date');
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
        Schema::dropIfExists('customer_reviews');
    }
}
