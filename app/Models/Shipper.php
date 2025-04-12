<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Shipper
 * 
 * @property int $ShipperID
 * @property string $CompanyName
 * @property string|null $Phone
 * 
 * @property Collection|Order[] $orders
 *
 * @package App\Models
 */
class Shipper extends Model
{
	protected $table = 'shippers';
	protected $primaryKey = 'ShipperID';
	public $timestamps = false;

	protected $fillable = [
		'CompanyName',
		'Phone'
	];

	public function orders()
	{
		return $this->hasMany(Order::class, 'ShipVia');
	}
}
