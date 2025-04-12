<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CurrentProductList
 * 
 * @property int $ProductID
 * @property string $ProductName
 *
 * @package App\Models
 */
class CurrentProductList extends Model
{
	protected $table = 'current product list';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ProductID' => 'int'
	];

	protected $fillable = [
		'ProductID',
		'ProductName'
	];
}
