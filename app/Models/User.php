<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
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
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
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
