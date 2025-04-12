<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Customercustomerdemo
 * 
 * @property string $CustomerID
 * @property string $CustomerTypeID
 * 
 * @property Customerdemographic $customerdemographic
 * @property Customer $customer
 *
 * @package App\Models
 */
class Customercustomerdemo extends Model
{
	protected $table = 'customercustomerdemo';
	public $incrementing = false;
	public $timestamps = false;

	public function customerdemographic()
	{
		return $this->belongsTo(Customerdemographic::class, 'CustomerTypeID');
	}

	public function customer()
	{
		return $this->belongsTo(Customer::class, 'CustomerID');
	}
}
