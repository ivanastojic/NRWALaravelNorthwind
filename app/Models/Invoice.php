<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Invoice
 * 
 * @property string|null $ShipName
 * @property string|null $ShipAddress
 * @property string|null $ShipCity
 * @property string|null $ShipRegion
 * @property string|null $ShipPostalCode
 * @property string|null $ShipCountry
 * @property string|null $CustomerID
 * @property string $CustomerName
 * @property string|null $Address
 * @property string|null $City
 * @property string|null $Region
 * @property string|null $PostalCode
 * @property string|null $Country
 * @property float $Salesperson
 * @property int $OrderID
 * @property Carbon|null $OrderDate
 * @property Carbon|null $RequiredDate
 * @property Carbon|null $ShippedDate
 * @property string $ShipperName
 * @property int $ProductID
 * @property string $ProductName
 * @property float $UnitPrice
 * @property int $Quantity
 * @property float $Discount
 * @property float|null $ExtendedPrice
 * @property float|null $Freight
 *
 * @package App\Models
 */
class Invoice extends Model
{
	protected $table = 'invoices';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'Salesperson' => 'float',
		'OrderID' => 'int',
		'OrderDate' => 'datetime',
		'RequiredDate' => 'datetime',
		'ShippedDate' => 'datetime',
		'ProductID' => 'int',
		'UnitPrice' => 'float',
		'Quantity' => 'int',
		'Discount' => 'float',
		'ExtendedPrice' => 'float',
		'Freight' => 'float'
	];

	protected $fillable = [
		'ShipName',
		'ShipAddress',
		'ShipCity',
		'ShipRegion',
		'ShipPostalCode',
		'ShipCountry',
		'CustomerID',
		'CustomerName',
		'Address',
		'City',
		'Region',
		'PostalCode',
		'Country',
		'Salesperson',
		'OrderID',
		'OrderDate',
		'RequiredDate',
		'ShippedDate',
		'ShipperName',
		'ProductID',
		'ProductName',
		'UnitPrice',
		'Quantity',
		'Discount',
		'ExtendedPrice',
		'Freight'
	];
}
