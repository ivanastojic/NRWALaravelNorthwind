<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
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
 * 
 * @property Category|null $category
 * @property Supplier|null $supplier
 * @property Collection|OrderDetail[] $order_details
 *
 * @package App\Models
 */
class Product extends Model
{
	protected $table = 'products';
	protected $primaryKey = 'ProductID';
	public $timestamps = false;

	protected $casts = [
		'SupplierID' => 'int',
		'CategoryID' => 'int',
		'UnitPrice' => 'float',
		'UnitsInStock' => 'int',
		'UnitsOnOrder' => 'int',
		'ReorderLevel' => 'int',
		'Discontinued' => 'bool'
	];

	protected $fillable = [
		'ProductName',
		'SupplierID',
		'CategoryID',
		'QuantityPerUnit',
		'UnitPrice',
		'UnitsInStock',
		'UnitsOnOrder',
		'ReorderLevel',
		'Discontinued'
	];

	public function category()
	{
		return $this->belongsTo(Category::class, 'CategoryID');
	}

	public function supplier()
	{
		return $this->belongsTo(Supplier::class, 'SupplierID');
	}

	public function order_details()
	{
		return $this->hasMany(OrderDetail::class, 'ProductID');
	}
	public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_details', 'ProductID', 'OrderID')
            ->withPivot('Quantity', 'UnitPrice', 'Discount')
            ->withTimestamps();
    }

}
