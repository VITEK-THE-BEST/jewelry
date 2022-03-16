<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Feedback
 * 
 * @property int $id
 * @property int $user_id
 * @property string $feedback
 * @property int $score
 * 
 * @property User $user
 *
 * @package App\Models
 */
class Feedback extends Model
{
	protected $table = 'feedbacks';
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int',
		'score' => 'int'
	];

	protected $fillable = [
		'user_id',
		'feedback',
		'score'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
