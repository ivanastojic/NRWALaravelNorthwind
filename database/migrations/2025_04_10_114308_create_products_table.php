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
        Schema::create('products', function (Blueprint $table) {
            $table->integer('ProductID', true);
            $table->string('ProductName', 40)->index('productname');
            $table->integer('SupplierID')->nullable()->index('fk_products_suppliers');
            $table->integer('CategoryID')->nullable()->index('fk_products_categories');
            $table->string('QuantityPerUnit', 20)->nullable();
            $table->decimal('UnitPrice', 10, 4)->nullable()->default(0);
            $table->smallInteger('UnitsInStock')->nullable()->default(0);
            $table->smallInteger('UnitsOnOrder')->nullable()->default(0);
            $table->smallInteger('ReorderLevel')->nullable()->default(0);
            $table->boolean('Discontinued')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
