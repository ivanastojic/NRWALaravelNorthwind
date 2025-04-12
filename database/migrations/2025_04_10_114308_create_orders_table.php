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
        Schema::create('orders', function (Blueprint $table) {
            $table->integer('OrderID', true);
            $table->string('CustomerID', 5)->nullable()->index('fk_orders_customers');
            $table->integer('EmployeeID')->nullable()->index('fk_orders_employees');
            $table->dateTime('OrderDate')->nullable()->index('orderdate');
            $table->dateTime('RequiredDate')->nullable();
            $table->dateTime('ShippedDate')->nullable()->index('shippeddate');
            $table->integer('ShipVia')->nullable()->index('fk_orders_shippers');
            $table->decimal('Freight', 10, 4)->nullable()->default(0);
            $table->string('ShipName', 40)->nullable();
            $table->string('ShipAddress', 60)->nullable();
            $table->string('ShipCity', 15)->nullable();
            $table->string('ShipRegion', 15)->nullable();
            $table->string('ShipPostalCode', 10)->nullable()->index('shippostalcode');
            $table->string('ShipCountry', 15)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
