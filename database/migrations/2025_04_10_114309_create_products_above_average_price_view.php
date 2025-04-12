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
        DB::statement("CREATE VIEW `products above average price` AS select `northwind`.`products`.`ProductName` AS `ProductName`,`northwind`.`products`.`UnitPrice` AS `UnitPrice` from `northwind`.`products` where (`northwind`.`products`.`UnitPrice` > (select avg(`northwind`.`products`.`UnitPrice`) from `northwind`.`products`))");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS `products above average price`");
    }
};
