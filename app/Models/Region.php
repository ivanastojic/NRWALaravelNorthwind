<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Region
 * 
 * @property int $RegionID
 * @property string $RegionDescription
 * 
 * @property Collection|Territory[] $territories
 *
 * @package App\Models
 */
class Region extends Model
{
	protected $table = 'region';
	protected $primaryKey = 'RegionID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'RegionID' => 'int'
	];

	protected $fillable = [
		'RegionID', 
		'RegionDescription'
	];

	public function territories()
	{
		return $this->hasMany(Territory::class, 'RegionID');
	}
}
