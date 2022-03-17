<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Type
 *
 * @property int $id
 * @property int $size_id
 * @property string $name
 * @property string $image
 *
 * @property Size $size
 *
 * @package App\Models
 */
class Type extends Model
{
	protected $table = 'types';
	public $timestamps = false;

	protected $casts = [
		'size_id' => 'int'
	];

	protected $fillable = [
		'size_id',
		'name',
		'image'
	];

	public function size()
	{
		return $this->belongsTo(Size::class);
	}

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
