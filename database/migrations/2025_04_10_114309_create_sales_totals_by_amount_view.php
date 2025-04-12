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
        DB::statement("CREATE VIEW `sales totals by amount` AS select `northwind`.`order subtotals`.`Subtotal` AS `SaleAmount`,`northwind`.`orders`.`OrderID` AS `OrderID`,`northwind`.`customers`.`CompanyName` AS `CompanyName`,`northwind`.`orders`.`ShippedDate` AS `ShippedDate` from ((`northwind`.`customers` join `northwind`.`orders` on((`northwind`.`customers`.`CustomerID` = `northwind`.`orders`.`CustomerID`))) join `northwind`.`order subtotals` on((`northwind`.`orders`.`OrderID` = `northwind`.`order subtotals`.`OrderID`))) where ((`northwind`.`order subtotals`.`Subtotal` > 2500) and (`northwind`.`orders`.`ShippedDate` between '1997-01-01' and '1997-12-31'))");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS `sales totals by amount`");
    }
};
