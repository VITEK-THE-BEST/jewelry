<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Gem
 *
 * @property int $id
 * @property string $name
 * @property string $image
 *
 * @package App\Models
 */
class Gem extends Model
{
	protected $table = 'gems';
	public $timestamps = false;

	protected $fillable = [
		'name',
		'image'
	];
    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
