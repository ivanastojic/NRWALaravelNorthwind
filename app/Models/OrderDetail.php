<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class OrderDetail
 * 
 * @property int $OrderID
 * @property int $ProductID
 * @property float $UnitPrice
 * @property int $Quantity
 * @property float $Discount
 * 
 * @property Order $order
 * @property Product $product
 *
 * @package App\Models
 */
class OrderDetail extends Model
{
	protected $table = 'order_details';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'OrderID' => 'int',
		'ProductID' => 'int',
		'UnitPrice' => 'float',
		'Quantity' => 'int',
		'Discount' => 'float'
	];

	protected $fillable = [
		'UnitPrice',
		'Quantity',
		'Discount'
	];

	public function order()
	{
		return $this->belongsTo(Order::class, 'OrderID');
	}

	public function product()
	{
		return $this->belongsTo(Product::class, 'ProductID');
	}
}
