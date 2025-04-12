<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Supplier
 * 
 * @property int $SupplierID
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
 * @property string|null $HomePage
 * 
 * @property Collection|Product[] $products
 *
 * @package App\Models
 */
class Supplier extends Model
{
	protected $table = 'suppliers';
	protected $primaryKey = 'SupplierID';
	public $timestamps = false;

	protected $fillable = [
		'CompanyName',
		'ContactName',
		'ContactTitle',
		'Address',
		'City',
		'Region',
		'PostalCode',
		'Country',
		'Phone',
		'Fax',
		'HomePage'
	];

	public function products()
	{
		return $this->hasMany(Product::class, 'SupplierID');
	}
}
