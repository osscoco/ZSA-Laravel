<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Voucher
 * 
 * @property int $id
 * @property string $reference
 * @property int $value
 * @property int $code
 * @property Carbon|null $expiration_date
 * @property int|null $card_id
 * @property Carbon $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Card|null $card
 *
 * @package App\Models
 */
class Voucher extends Model
{
	protected $table = 'voucher';

	protected $casts = [
		'value' => 'int',
		'code' => 'int',
		'expiration_date' => 'datetime',
		'card_id' => 'int'
	];

	protected $fillable = [
		'reference',
		'value',
		'code',
		'expiration_date',
		'card_id'
	];

	public function card()
	{
		return $this->belongsTo(Card::class);
	}
}
