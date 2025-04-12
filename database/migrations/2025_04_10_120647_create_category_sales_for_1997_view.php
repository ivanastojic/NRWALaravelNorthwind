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
        DB::statement("CREATE VIEW `category sales for 1997` AS select `northwind`.`product sales for 1997`.`CategoryName` AS `CategoryName`,sum(`northwind`.`product sales for 1997`.`ProductSales`) AS `CategorySales` from `northwind`.`product sales for 1997` group by `northwind`.`product sales for 1997`.`CategoryName`");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS `category sales for 1997`");
    }
};
