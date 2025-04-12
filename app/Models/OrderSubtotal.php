<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class OrderSubtotal
 * 
 * @property int $OrderID
 * @property float|null $Subtotal
 *
 * @package App\Models
 */
class OrderSubtotal extends Model
{
	protected $table = 'order subtotals';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'OrderID' => 'int',
		'Subtotal' => 'float'
	];

	protected $fillable = [
		'OrderID',
		'Subtotal'
	];
}
