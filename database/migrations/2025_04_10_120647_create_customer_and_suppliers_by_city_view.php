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
        DB::statement("CREATE VIEW `customer and suppliers by city` AS select `northwind`.`customers`.`City` AS `City`,`northwind`.`customers`.`CompanyName` AS `CompanyName`,`northwind`.`customers`.`ContactName` AS `ContactName`,'Customers' AS `Relationship` from `northwind`.`customers` union select `northwind`.`suppliers`.`City` AS `City`,`northwind`.`suppliers`.`CompanyName` AS `CompanyName`,`northwind`.`suppliers`.`ContactName` AS `ContactName`,'Suppliers' AS `Suppliers` from `northwind`.`suppliers` order by `City`,`CompanyName`");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS `customer and suppliers by city`");
    }
};
