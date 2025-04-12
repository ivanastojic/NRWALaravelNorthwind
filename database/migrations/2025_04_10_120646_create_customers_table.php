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
        Schema::create('customers', function (Blueprint $table) {
            $table->string('CustomerID', 5)->primary();
            $table->string('CompanyName', 40)->index('companyname');
            $table->string('ContactName', 30)->nullable();
            $table->string('ContactTitle', 30)->nullable();
            $table->string('Address', 60)->nullable();
            $table->string('City', 15)->nullable()->index('city');
            $table->string('Region', 15)->nullable()->index('region');
            $table->string('PostalCode', 10)->nullable()->index('postalcode');
            $table->string('Country', 15)->nullable();
            $table->string('Phone', 24)->nullable();
            $table->string('Fax', 24)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
