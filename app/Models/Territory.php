<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Territory
 * 
 * @property string $TerritoryID
 * @property string $TerritoryDescription
 * @property int $RegionID
 * 
 * @property Region $region
 * @property Collection|Employeeterritory[] $employeeterritories
 *
 * @package App\Models
 */
class Territory extends Model
{
	protected $table = 'territories';
	protected $primaryKey = 'TerritoryID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'RegionID' => 'int'
	];

	protected $fillable = [
		'TerritoryDescription',
		'RegionID',
		'TerritoryID',
	];

	public function region()
	{
		return $this->belongsTo(Region::class, 'RegionID');
	}

	public function employeeterritories()
	{
		return $this->hasMany(Employeeterritory::class, 'TerritoryID');
	}
}
