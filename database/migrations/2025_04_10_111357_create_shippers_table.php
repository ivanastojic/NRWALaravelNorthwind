<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('shippers', function (Blueprint $table) {
            $table->id('ShipperID'); // primarni ključ s točnim imenom iz relacijskog modela
            $table->string('CompanyName');
            $table->string('Phone')->nullable(); // Ako želiš da može biti NULL, inače makni ->nullable()
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shippers');
    }
};
