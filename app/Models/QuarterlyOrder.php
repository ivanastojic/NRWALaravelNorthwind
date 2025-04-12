<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class QuarterlyOrder
 * 
 * @property string $CustomerID
 * @property string $CompanyName
 * @property string|null $City
 * @property string|null $Country
 *
 * @package App\Models
 */
class QuarterlyOrder extends Model
{
	protected $table = 'quarterly orders';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'CustomerID',
		'CompanyName',
		'City',
		'Country'
	];
}
