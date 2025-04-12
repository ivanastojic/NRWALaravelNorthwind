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
        DB::statement("CREATE VIEW `order details extended` AS select `northwind`.`order details`.`OrderID` AS `OrderID`,`northwind`.`order details`.`ProductID` AS `ProductID`,`northwind`.`products`.`ProductName` AS `ProductName`,`northwind`.`order details`.`UnitPrice` AS `UnitPrice`,`northwind`.`order details`.`Quantity` AS `Quantity`,`northwind`.`order details`.`Discount` AS `Discount`,((((`northwind`.`order details`.`UnitPrice` * `northwind`.`order details`.`Quantity`) * (1 - `northwind`.`order details`.`Discount`)) / 100) * 100) AS `ExtendedPrice` from (`northwind`.`products` join `northwind`.`order details` on((`northwind`.`products`.`ProductID` = `northwind`.`order details`.`ProductID`)))");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS `order details extended`");
    }
};
