<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Employee
 * 
 * @property int $EmployeeID
 * @property string $LastName
 * @property string $FirstName
 * @property string|null $Title
 * @property string|null $TitleOfCourtesy
 * @property Carbon|null $BirthDate
 * @property Carbon|null $HireDate
 * @property string|null $Address
 * @property string|null $City
 * @property string|null $Region
 * @property string|null $PostalCode
 * @property string|null $Country
 * @property string|null $HomePhone
 * @property string|null $Extension
 * @property string|null $Photo
 * @property string $Notes
 * @property int|null $ReportsTo
 * @property string|null $PhotoPath
 * @property float|null $Salary
 * 
 * @property Employee|null $employee
 * @property Collection|Employee[] $employees
 * @property Collection|Employeeterritory[] $employeeterritories
 * @property Collection|Order[] $orders
 *
 * @package App\Models
 */
class Employee extends Model
{
	protected $table = 'employees';
	protected $primaryKey = 'EmployeeID';
	public $timestamps = false;

	protected $casts = [
		'BirthDate' => 'datetime',
		'HireDate' => 'datetime',
		'ReportsTo' => 'int',
		'Salary' => 'float'
	];

	protected $fillable = [
		'LastName',
		'FirstName',
		'Title',
		'TitleOfCourtesy',
		'BirthDate',
		'HireDate',
		'Address',
		'City',
		'Region',
		'PostalCode',
		'Country',
		'HomePhone',
		'Extension',
		'Photo',
		'Notes',
		'ReportsTo',
		'PhotoPath',
		'Salary'
	];

	public function employee()
	{
		return $this->belongsTo(Employee::class, 'ReportsTo');
	}

	public function employees()
	{
		return $this->hasMany(Employee::class, 'ReportsTo');
	}

	public function employeeterritories()
	{
		return $this->hasMany(Employeeterritory::class, 'EmployeeID');
	}

	public function orders()
	{
		return $this->hasMany(Order::class, 'EmployeeID');
	}
}
