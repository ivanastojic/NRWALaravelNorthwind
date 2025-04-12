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
        DB::statement("CREATE VIEW `alphabetical list of products` AS select `northwind`.`products`.`ProductID` AS `ProductID`,`northwind`.`products`.`ProductName` AS `ProductName`,`northwind`.`products`.`SupplierID` AS `SupplierID`,`northwind`.`products`.`CategoryID` AS `CategoryID`,`northwind`.`products`.`QuantityPerUnit` AS `QuantityPerUnit`,`northwind`.`products`.`UnitPrice` AS `UnitPrice`,`northwind`.`products`.`UnitsInStock` AS `UnitsInStock`,`northwind`.`products`.`UnitsOnOrder` AS `UnitsOnOrder`,`northwind`.`products`.`ReorderLevel` AS `ReorderLevel`,`northwind`.`products`.`Discontinued` AS `Discontinued`,`northwind`.`categories`.`CategoryName` AS `CategoryName` from (`northwind`.`categories` join `northwind`.`products` on((`northwind`.`categories`.`CategoryID` = `northwind`.`products`.`CategoryID`))) where (`northwind`.`products`.`Discontinued` = 0)");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS `alphabetical list of products`");
    }
};
