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
        DB::statement("CREATE VIEW `quarterly orders` AS select distinct `northwind`.`customers`.`CustomerID` AS `CustomerID`,`northwind`.`customers`.`CompanyName` AS `CompanyName`,`northwind`.`customers`.`City` AS `City`,`northwind`.`customers`.`Country` AS `Country` from (`northwind`.`customers` join `northwind`.`orders` on((`northwind`.`customers`.`CustomerID` = `northwind`.`orders`.`CustomerID`))) where (`northwind`.`orders`.`OrderDate` between '1997-01-01' and '1997-12-31')");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS `quarterly orders`");
    }
};
