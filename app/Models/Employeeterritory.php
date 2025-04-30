<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Employeeterritory
 * 
 * @property int $EmployeeID
 * @property string $TerritoryID
 * 
 * @property Employee $employee
 * @property Territory $territory
 *
 * @package App\Models
 */
class Employeeterritory extends Model
{
	protected $table = 'employeeterritories';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'EmployeeID' => 'int'
	];
	
	public function employee()
	{
		return $this->belongsTo(Employee::class, 'EmployeeID');
	}

	public function territory()
	{
		return $this->belongsTo(Territory::class, 'TerritoryID');
	}
}
