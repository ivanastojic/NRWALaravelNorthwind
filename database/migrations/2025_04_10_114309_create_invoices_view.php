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
        DB::statement("CREATE VIEW `invoices` AS select `northwind`.`orders`.`ShipName` AS `ShipName`,`northwind`.`orders`.`ShipAddress` AS `ShipAddress`,`northwind`.`orders`.`ShipCity` AS `ShipCity`,`northwind`.`orders`.`ShipRegion` AS `ShipRegion`,`northwind`.`orders`.`ShipPostalCode` AS `ShipPostalCode`,`northwind`.`orders`.`ShipCountry` AS `ShipCountry`,`northwind`.`orders`.`CustomerID` AS `CustomerID`,`northwind`.`customers`.`CompanyName` AS `CustomerName`,`northwind`.`customers`.`Address` AS `Address`,`northwind`.`customers`.`City` AS `City`,`northwind`.`customers`.`Region` AS `Region`,`northwind`.`customers`.`PostalCode` AS `PostalCode`,`northwind`.`customers`.`Country` AS `Country`,((`northwind`.`employees`.`FirstName` + ' ') + `northwind`.`employees`.`LastName`) AS `Salesperson`,`northwind`.`orders`.`OrderID` AS `OrderID`,`northwind`.`orders`.`OrderDate` AS `OrderDate`,`northwind`.`orders`.`RequiredDate` AS `RequiredDate`,`northwind`.`orders`.`ShippedDate` AS `ShippedDate`,`northwind`.`shippers`.`CompanyName` AS `ShipperName`,`northwind`.`order details`.`ProductID` AS `ProductID`,`northwind`.`products`.`ProductName` AS `ProductName`,`northwind`.`order details`.`UnitPrice` AS `UnitPrice`,`northwind`.`order details`.`Quantity` AS `Quantity`,`northwind`.`order details`.`Discount` AS `Discount`,((((`northwind`.`order details`.`UnitPrice` * `northwind`.`order details`.`Quantity`) * (1 - `northwind`.`order details`.`Discount`)) / 100) * 100) AS `ExtendedPrice`,`northwind`.`orders`.`Freight` AS `Freight` from (((((`northwind`.`customers` join `northwind`.`orders` on((`northwind`.`customers`.`CustomerID` = `northwind`.`orders`.`CustomerID`))) join `northwind`.`employees` on((`northwind`.`employees`.`EmployeeID` = `northwind`.`orders`.`EmployeeID`))) join `northwind`.`order details` on((`northwind`.`orders`.`OrderID` = `northwind`.`order details`.`OrderID`))) join `northwind`.`products` on((`northwind`.`products`.`ProductID` = `northwind`.`order details`.`ProductID`))) join `northwind`.`shippers` on((`northwind`.`shippers`.`ShipperID` = `northwind`.`orders`.`ShipVia`)))");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS `invoices`");
    }
};
