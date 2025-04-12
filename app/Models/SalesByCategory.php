<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SalesByCategory
 * 
 * @property int $CategoryID
 * @property string $CategoryName
 * @property string $ProductName
 * @property float|null $ProductSales
 *
 * @package App\Models
 */
class SalesByCategory extends Model
{
	protected $table = 'sales by category';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'CategoryID' => 'int',
		'ProductSales' => 'float'
	];

	protected $fillable = [
		'CategoryID',
		'CategoryName',
		'ProductName',
		'ProductSales'
	];
}
