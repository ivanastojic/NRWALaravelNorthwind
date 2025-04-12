<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CustomerAndSuppliersByCity
 * 
 * @property string|null $City
 * @property string $CompanyName
 * @property string|null $ContactName
 * @property string $Relationship
 *
 * @package App\Models
 */
class CustomerAndSuppliersByCity extends Model
{
	protected $table = 'customer and suppliers by city';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'City',
		'CompanyName',
		'ContactName',
		'Relationship'
	];
}
