<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Customer
 * 
 * @property string $CustomerID
 * @property string $CompanyName
 * @property string|null $ContactName
 * @property string|null $ContactTitle
 * @property string|null $Address
 * @property string|null $City
 * @property string|null $Region
 * @property string|null $PostalCode
 * @property string|null $Country
 * @property string|null $Phone
 * @property string|null $Fax
 * 
 * @property Collection|Customercustomerdemo[] $customercustomerdemos
 * @property Collection|Order[] $orders
 *
 * @package App\Models
 */
class Customer extends Model
{
	use HasFactory;
	protected $table = 'customers';
	protected $primaryKey = 'CustomerID';
	public $incrementing = false;
	public $timestamps = false;
	protected $keyType = 'string';


	protected $fillable = [
		'CustomerID',
		'CompanyName',
		'ContactName',
		'ContactTitle',
		'Address',
		'City',
		'Region',
		'PostalCode',
		'Country',
		'Phone',
		'Fax'
	];

	public function customercustomerdemos()
	{
		return $this->hasMany(Customercustomerdemo::class, 'CustomerID');
	}

	public function orders()
	{
		return $this->hasMany(Order::class, 'CustomerID');
	}
	public function demographics()
    {
        return $this->belongsToMany(CustomerDemographic::class, 'customercustomerdemo', 'CustomerID', 'CustomerTypeID');
    }
}
