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
        DB::statement("CREATE VIEW `order subtotals` AS select `northwind`.`order details`.`OrderID` AS `OrderID`,sum(((((`northwind`.`order details`.`UnitPrice` * `northwind`.`order details`.`Quantity`) * (1 - `northwind`.`order details`.`Discount`)) / 100) * 100)) AS `Subtotal` from `northwind`.`order details` group by `northwind`.`order details`.`OrderID`");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS `order subtotals`");
    }
};
