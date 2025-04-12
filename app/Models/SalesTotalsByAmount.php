<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SalesTotalsByAmount
 * 
 * @property float|null $SaleAmount
 * @property int $OrderID
 * @property string $CompanyName
 * @property Carbon|null $ShippedDate
 *
 * @package App\Models
 */
class SalesTotalsByAmount extends Model
{
	protected $table = 'sales totals by amount';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'SaleAmount' => 'float',
		'OrderID' => 'int',
		'ShippedDate' => 'datetime'
	];

	protected $fillable = [
		'SaleAmount',
		'OrderID',
		'CompanyName',
		'ShippedDate'
	];
}
