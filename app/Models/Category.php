<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 * 
 * @property int $CategoryID
 * @property string $CategoryName
 * @property string|null $Description
 * @property string|null $Picture
 * 
 * @property Collection|Product[] $products
 *
 * @package App\Models
 */
class Category extends Model
{
	protected $table = 'categories';
	protected $primaryKey = 'CategoryID';
	public $timestamps = false;

	protected $fillable = [
		'CategoryName',
		'Description',
		'Picture'
	];

	public function products()
	{
		return $this->hasMany(Product::class, 'CategoryID');
	}
}
