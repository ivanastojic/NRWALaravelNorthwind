<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class OrdersQry
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
 * @property string $CompanyName
 * @property string|null $Address
 * @property string|null $City
 * @property string|null $Region
 * @property string|null $PostalCode
 * @property string|null $Country
 *
 * @package App\Models
 */
class OrdersQry extends Model
{
	protected $table = 'orders qry';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'OrderID' => 'int',
		'EmployeeID' => 'int',
		'OrderDate' => 'datetime',
		'RequiredDate' => 'datetime',
		'ShippedDate' => 'datetime',
		'ShipVia' => 'int',
		'Freight' => 'float'
	];

	protected $fillable = [
		'OrderID',
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
		'ShipCountry',
		'CompanyName',
		'Address',
		'City',
		'Region',
		'PostalCode',
		'Country'
	];
}
