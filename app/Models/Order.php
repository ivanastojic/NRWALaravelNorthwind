<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Order
 * 
 * @property int $OrderID
 * @property string|null $CustomerID
 * @property int|null $EmployeeID
 * @property Carbon|null $OrderDate
 * @property Carbon|null $RequiredDate
 * @property Carbon|null $ShippedDate
 * @property int|null $ShipVia
 * @property float|null $Freight
 * @property string|null $ShipName
 * @property string|null $ShipAddress
 * @property string|null $ShipCity
 * @property string|null $ShipRegion
 * @property string|null $ShipPostalCode
 * @property string|null $ShipCountry
 * 
 * @property Customer|null $customer
 * @property Employee|null $employee
 * @property Shipper|null $shipper
 * @property Collection|OrderDetail[] $order_details
 *
 * @package App\Models
 */
class Order extends Model
{
	protected $table = 'orders';
	protected $primaryKey = 'OrderID';
	public $timestamps = false;

	protected $casts = [
		'EmployeeID' => 'int',
		'OrderDate' => 'datetime',
		'RequiredDate' => 'datetime',
		'ShippedDate' => 'datetime',
		'ShipVia' => 'int',
		'Freight' => 'float'
	];

	protected $fillable = [
		'CustomerID',
		'EmployeeID',
		'OrderDate',
		'RequiredDate',
		'ShippedDate',
		'ShipVia',
		'Freight',
		'ShipName',
		'ShipAddress',
		'ShipCity',
		'ShipRegion',
		'ShipPostalCode',
		'ShipCountry'
	];

	public function customer()
	{
		return $this->belongsTo(Customer::class, 'CustomerID');
	}

	public function employee()
	{
		return $this->belongsTo(Employee::class, 'EmployeeID');
	}

	public function shipper()
	{
		return $this->belongsTo(Shipper::class, 'ShipVia');
	}

	public function order_details()
	{
		return $this->hasMany(OrderDetail::class, 'OrderID');
	}
	public function products()
    {
        return $this->belongsToMany(Product::class, 'order_details', 'OrderID', 'ProductID')
            ->withPivot('Quantity', 'UnitPrice', 'Discount');
    }

}
