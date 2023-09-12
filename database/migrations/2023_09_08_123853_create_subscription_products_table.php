<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('subscription_products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('subscription_category_id');
            $table->foreign('subscription_category_id')->references('id')->on('subscription_category')->onDelete('cascade');
            $table->unsignedBigInteger('subscription_sub_category_id');
            $table->foreign('subscription_sub_category_id')->references('id')->on('subscription_sub_category')->onDelete('cascade');
            $table->string('price');
            $table->string('description');
            $table->string('image');
            $table->integer('rating');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscription_products');
    }
};
