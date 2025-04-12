<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

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
	protected $table = 'customerdemographics';
	protected $primaryKey = 'CustomerTypeID';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'CustomerTypeID',
		'CustomerDesc'
	];

	public function customercustomerdemos()
	{
		return $this->hasMany(Customercustomerdemo::class, 'CustomerTypeID');
	}
}
