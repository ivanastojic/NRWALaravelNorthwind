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
        Schema::create('order details', function (Blueprint $table) {
            $table->integer('OrderID');
            $table->integer('ProductID')->index('fk_order_details_products');
            $table->decimal('UnitPrice', 10, 4)->default(0);
            $table->smallInteger('Quantity')->default(1);
            $table->double('Discount')->default(0);

            $table->primary(['OrderID', 'ProductID']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order details');
    }
};
