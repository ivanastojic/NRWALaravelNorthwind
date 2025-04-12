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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->integer('SupplierID', true);
            $table->string('CompanyName', 40)->index('companyname');
            $table->string('ContactName', 30)->nullable();
            $table->string('ContactTitle', 30)->nullable();
            $table->string('Address', 60)->nullable();
            $table->string('City', 15)->nullable();
            $table->string('Region', 15)->nullable();
            $table->string('PostalCode', 10)->nullable()->index('postalcode');
            $table->string('Country', 15)->nullable();
            $table->string('Phone', 24)->nullable();
            $table->string('Fax', 24)->nullable();
            $table->mediumText('HomePage')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
