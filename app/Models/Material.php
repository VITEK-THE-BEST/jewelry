<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Material
 * 
 * @property int $id
 * @property string $name
 * @property string $image
 *
 * @package App\Models
 */
class Material extends Model
{
	protected $table = 'materials';
	public $timestamps = false;

	protected $fillable = [
		'name',
		'image'
	];
}
