<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class OrderDetailsExtended
 * 
 * @property int $OrderID
 * @property int $ProductID
 * @property string $ProductName
 * @property float $UnitPrice
 * @property int $Quantity
 * @property float $Discount
 * @property float|null $ExtendedPrice
 *
 * @package App\Models
 */
class OrderDetailsExtended extends Model
{
	protected $table = 'order details extended';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'OrderID' => 'int',
		'ProductID' => 'int',
		'UnitPrice' => 'float',
		'Quantity' => 'int',
		'Discount' => 'float',
		'ExtendedPrice' => 'float'
	];

	protected $fillable = [
		'OrderID',
		'ProductID',
		'ProductName',
		'UnitPrice',
		'Quantity',
		'Discount',
		'ExtendedPrice'
	];
}
