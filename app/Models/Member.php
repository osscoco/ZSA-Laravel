<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Member
 * 
 * @property int $id
 * @property string $firstname
 * @property string $lastname
 * @property string $phone
 * @property string $email
 * @property int $card_id
 * @property Carbon $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Card $card
 * @property Collection|Store[] $stores
 *
 * @package App\Models
 */
class Member extends Model
{
	protected $table = 'members';

	protected $casts = [
		'card_id' => 'int'
	];

	protected $fillable = [
		'firstname',
		'lastname',
		'phone',
		'email',
		'card_id'
	];

	public function card()
	{
		return $this->belongsTo(Card::class);
	}

	public function stores()
	{
		return $this->belongsToMany(Store::class, 'store_members')
					->withPivot('id')
					->withTimestamps();
	}
}
