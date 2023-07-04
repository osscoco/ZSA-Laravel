<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Card
 * 
 * @property int $id
 * @property string $reference
 * @property int $fidelityPoints
 * @property Carbon $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Member[] $members
 * @property Collection|Voucher[] $vouchers
 *
 * @package App\Models
 */
class Card extends Model
{
	protected $table = 'cards';

	protected $casts = [
		'fidelityPoints' => 'int'
	];

	protected $fillable = [
		'reference',
		'fidelityPoints'
	];

	public function members()
	{
		return $this->hasMany(Member::class);
	}

	public function vouchers()
	{
		return $this->hasMany(Voucher::class);
	}
}
