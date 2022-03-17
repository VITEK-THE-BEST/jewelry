<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 *
 * @property int $id
 * @property string $login
 * @property string $password
 *
 * @property Collection|Feedback[] $feedback
 *
 * @package App\Models
 */
class User extends Model
{
	protected $table = 'users';
	public $timestamps = false;

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'login',
		'password'
	];

	public function feedback()
	{
		return $this->hasMany(Feedback::class);
	}

    public function items()
    {
        return $this->belongsToMany(Item::class);
    }
}
