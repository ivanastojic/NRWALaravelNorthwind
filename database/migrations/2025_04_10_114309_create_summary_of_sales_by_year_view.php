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
        DB::statement("CREATE VIEW `summary of sales by year` AS select `northwind`.`orders`.`ShippedDate` AS `ShippedDate`,`northwind`.`orders`.`OrderID` AS `OrderID`,`northwind`.`order subtotals`.`Subtotal` AS `Subtotal` from (`northwind`.`orders` join `northwind`.`order subtotals` on((`northwind`.`orders`.`OrderID` = `northwind`.`order subtotals`.`OrderID`))) where (`northwind`.`orders`.`ShippedDate` is not null)");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS `summary of sales by year`");
    }
};
