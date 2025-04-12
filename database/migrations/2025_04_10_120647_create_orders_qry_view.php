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
        DB::statement("CREATE VIEW `orders qry` AS select `northwind`.`orders`.`OrderID` AS `OrderID`,`northwind`.`orders`.`CustomerID` AS `CustomerID`,`northwind`.`orders`.`EmployeeID` AS `EmployeeID`,`northwind`.`orders`.`OrderDate` AS `OrderDate`,`northwind`.`orders`.`RequiredDate` AS `RequiredDate`,`northwind`.`orders`.`ShippedDate` AS `ShippedDate`,`northwind`.`orders`.`ShipVia` AS `ShipVia`,`northwind`.`orders`.`Freight` AS `Freight`,`northwind`.`orders`.`ShipName` AS `ShipName`,`northwind`.`orders`.`ShipAddress` AS `ShipAddress`,`northwind`.`orders`.`ShipCity` AS `ShipCity`,`northwind`.`orders`.`ShipRegion` AS `ShipRegion`,`northwind`.`orders`.`ShipPostalCode` AS `ShipPostalCode`,`northwind`.`orders`.`ShipCountry` AS `ShipCountry`,`northwind`.`customers`.`CompanyName` AS `CompanyName`,`northwind`.`customers`.`Address` AS `Address`,`northwind`.`customers`.`City` AS `City`,`northwind`.`customers`.`Region` AS `Region`,`northwind`.`customers`.`PostalCode` AS `PostalCode`,`northwind`.`customers`.`Country` AS `Country` from (`northwind`.`customers` join `northwind`.`orders` on((`northwind`.`customers`.`CustomerID` = `northwind`.`orders`.`CustomerID`)))");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS `orders qry`");
    }
};
