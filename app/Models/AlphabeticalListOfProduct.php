<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AlphabeticalListOfProduct
 * 
 * @property int $ProductID
 * @property string $ProductName
 * @property int|null $SupplierID
 * @property int|null $CategoryID
 * @property string|null $QuantityPerUnit
 * @property float|null $UnitPrice
 * @property int|null $UnitsInStock
 * @property int|null $UnitsOnOrder
 * @property int|null $ReorderLevel
 * @property bool $Discontinued
 * @property string $CategoryName
 *
 * @package App\Models
 */
class AlphabeticalListOfProduct extends Model
{
	protected $table = 'alphabetical list of products';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ProductID' => 'int',
		'SupplierID' => 'int',
		'CategoryID' => 'int',
		'UnitPrice' => 'float',
		'UnitsInStock' => 'int',
		'UnitsOnOrder' => 'int',
		'ReorderLevel' => 'int',
		'Discontinued' => 'bool'
	];

	protected $fillable = [
		'ProductID',
		'ProductName',
		'SupplierID',
		'CategoryID',
		'QuantityPerUnit',
		'UnitPrice',
		'UnitsInStock',
		'UnitsOnOrder',
		'ReorderLevel',
		'Discontinued',
		'CategoryName'
	];
}
