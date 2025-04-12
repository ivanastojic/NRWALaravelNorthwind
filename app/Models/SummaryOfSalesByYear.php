<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SummaryOfSalesByYear
 * 
 * @property Carbon|null $ShippedDate
 * @property int $OrderID
 * @property float|null $Subtotal
 *
 * @package App\Models
 */
class SummaryOfSalesByYear extends Model
{
	protected $table = 'summary of sales by year';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ShippedDate' => 'datetime',
		'OrderID' => 'int',
		'Subtotal' => 'float'
	];

	protected $fillable = [
		'ShippedDate',
		'OrderID',
		'Subtotal'
	];
}
