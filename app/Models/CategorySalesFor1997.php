<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CategorySalesFor1997
 * 
 * @property string $CategoryName
 * @property float|null $CategorySales
 *
 * @package App\Models
 */
class CategorySalesFor1997 extends Model
{
	protected $table = 'category sales for 1997';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'CategorySales' => 'float'
	];

	protected $fillable = [
		'CategoryName',
		'CategorySales'
	];
}
