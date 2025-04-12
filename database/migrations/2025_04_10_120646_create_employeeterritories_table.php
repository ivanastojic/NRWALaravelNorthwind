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
        Schema::create('employeeterritories', function (Blueprint $table) {
            $table->integer('EmployeeID');
            $table->string('TerritoryID', 20)->index('fk_employeeterritories_territories');

            $table->primary(['EmployeeID', 'TerritoryID']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employeeterritories');
    }
};
