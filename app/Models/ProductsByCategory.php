<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductsByCategory
 * 
 * @property string $CategoryName
 * @property string $ProductName
 * @property string|null $QuantityPerUnit
 * @property int|null $UnitsInStock
 * @property bool $Discontinued
 *
 * @package App\Models
 */
class ProductsByCategory extends Model
{
	protected $table = 'products by category';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'UnitsInStock' => 'int',
		'Discontinued' => 'bool'
	];

	protected $fillable = [
		'CategoryName',
		'ProductName',
		'QuantityPerUnit',
		'UnitsInStock',
		'Discontinued'
	];
}
