<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("CREATE VIEW `current product list` AS select `northwind`.`products`.`ProductID` AS `ProductID`,`northwind`.`products`.`ProductName` AS `ProductName` from `northwind`.`products` where (`northwind`.`products`.`Discontinued` = 0)");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS `current product list`");
    }
};
