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
        Schema::create('customercustomerdemo', function (Blueprint $table) {
            $table->string('CustomerID', 5);
            $table->string('CustomerTypeID', 10)->index('fk_customercustomerdemo');

            $table->primary(['CustomerID', 'CustomerTypeID']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customercustomerdemo');
    }
};
