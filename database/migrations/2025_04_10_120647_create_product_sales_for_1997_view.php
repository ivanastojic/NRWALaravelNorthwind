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
        DB::statement("CREATE VIEW `product sales for 1997` AS select `northwind`.`categories`.`CategoryName` AS `CategoryName`,`northwind`.`products`.`ProductName` AS `ProductName`,sum(((((`northwind`.`order details`.`UnitPrice` * `northwind`.`order details`.`Quantity`) * (1 - `northwind`.`order details`.`Discount`)) / 100) * 100)) AS `ProductSales` from (((`northwind`.`categories` join `northwind`.`products` on((`northwind`.`categories`.`CategoryID` = `northwind`.`products`.`CategoryID`))) join `northwind`.`order details` on((`northwind`.`products`.`ProductID` = `northwind`.`order details`.`ProductID`))) join `northwind`.`orders` on((`northwind`.`orders`.`OrderID` = `northwind`.`order details`.`OrderID`))) where (`northwind`.`orders`.`ShippedDate` between '1997-01-01' and '1997-12-31') group by `northwind`.`categories`.`CategoryName`,`northwind`.`products`.`ProductName`");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS `product sales for 1997`");
    }
};
