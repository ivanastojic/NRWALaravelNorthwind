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
        DB::statement("CREATE VIEW `sales by category` AS select `northwind`.`categories`.`CategoryID` AS `CategoryID`,`northwind`.`categories`.`CategoryName` AS `CategoryName`,`northwind`.`products`.`ProductName` AS `ProductName`,sum(`northwind`.`order details extended`.`ExtendedPrice`) AS `ProductSales` from (((`northwind`.`categories` join `northwind`.`products` on((`northwind`.`categories`.`CategoryID` = `northwind`.`products`.`CategoryID`))) join `northwind`.`order details extended` on((`northwind`.`products`.`ProductID` = `northwind`.`order details extended`.`ProductID`))) join `northwind`.`orders` on((`northwind`.`orders`.`OrderID` = `northwind`.`order details extended`.`OrderID`))) where (`northwind`.`orders`.`OrderDate` between '1997-01-01' and '1997-12-31') group by `northwind`.`categories`.`CategoryID`,`northwind`.`categories`.`CategoryName`,`northwind`.`products`.`ProductName`");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS `sales by category`");
    }
};
