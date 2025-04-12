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
        DB::statement("CREATE VIEW `products by category` AS select `northwind`.`categories`.`CategoryName` AS `CategoryName`,`northwind`.`products`.`ProductName` AS `ProductName`,`northwind`.`products`.`QuantityPerUnit` AS `QuantityPerUnit`,`northwind`.`products`.`UnitsInStock` AS `UnitsInStock`,`northwind`.`products`.`Discontinued` AS `Discontinued` from (`northwind`.`categories` join `northwind`.`products` on((`northwind`.`categories`.`CategoryID` = `northwind`.`products`.`CategoryID`))) where (`northwind`.`products`.`Discontinued` <> 1)");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS `products by category`");
    }
};
