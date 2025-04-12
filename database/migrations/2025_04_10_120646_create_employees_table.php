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
        Schema::create('employees', function (Blueprint $table) {
            $table->integer('EmployeeID', true);
            $table->string('LastName', 20)->index('lastname');
            $table->string('FirstName', 10);
            $table->string('Title', 30)->nullable();
            $table->string('TitleOfCourtesy', 25)->nullable();
            $table->dateTime('BirthDate')->nullable();
            $table->dateTime('HireDate')->nullable();
            $table->string('Address', 60)->nullable();
            $table->string('City', 15)->nullable();
            $table->string('Region', 15)->nullable();
            $table->string('PostalCode', 10)->nullable()->index('postalcode');
            $table->string('Country', 15)->nullable();
            $table->string('HomePhone', 24)->nullable();
            $table->string('Extension', 4)->nullable();
            $table->binary('Photo')->nullable();
            $table->mediumText('Notes');
            $table->integer('ReportsTo')->nullable()->index('fk_employees_employees');
            $table->string('PhotoPath')->nullable();
            $table->float('Salary')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
