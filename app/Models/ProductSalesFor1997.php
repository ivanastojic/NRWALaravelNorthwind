<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductSalesFor1997
 * 
 * @property string $CategoryName
 * @property string $ProductName
 * @property float|null $ProductSales
 *
 * @package App\Models
 */
class ProductSalesFor1997 extends Model
{
	protected $table = 'product sales for 1997';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ProductSales' => 'float'
	];

	protected $fillable = [
		'CategoryName',
		'ProductName',
		'ProductSales'
	];
}
