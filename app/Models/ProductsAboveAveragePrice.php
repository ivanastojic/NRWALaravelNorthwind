<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductsAboveAveragePrice
 * 
 * @property string $ProductName
 * @property float|null $UnitPrice
 *
 * @package App\Models
 */
class ProductsAboveAveragePrice extends Model
{
	protected $table = 'products above average price';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'UnitPrice' => 'float'
	];

	protected $fillable = [
		'ProductName',
		'UnitPrice'
	];
}
