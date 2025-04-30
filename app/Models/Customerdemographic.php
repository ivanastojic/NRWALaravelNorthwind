<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Customerdemographic
 * 
 * @property string $CustomerTypeID
 * @property string|null $CustomerDesc
 * 
 * @property Collection|Customercustomerdemo[] $customercustomerdemos
 *
 * @package App\Models
 */
class Customerdemographic extends Model
{
	use HasFactory;
	protected $table = 'customerdemographics';
	protected $primaryKey = 'CustomerTypeID';
	public $incrementing = false;
	protected $keyType = 'string';
	public $timestamps = false;

	protected $fillable = [
		'CustomerTypeID',
		'CustomerDesc'
	];

	public function customercustomerdemos()
	{
		return $this->hasMany(Customercustomerdemo::class, 'CustomerTypeID');
	}
	public function customers()
    {
        return $this->belongsToMany(Customer::class, 'customercustomerdemo', 'CustomerTypeID', 'CustomerID');
    }
}
