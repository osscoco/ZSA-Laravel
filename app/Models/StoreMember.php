<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class StoreMember
 * 
 * @property int $id
 * @property int $store_id
 * @property int $member_id
 * @property Carbon $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Member $member
 * @property Store $store
 *
 * @package App\Models
 */
class StoreMember extends Model
{
	protected $table = 'store_members';

	protected $casts = [
		'store_id' => 'int',
		'member_id' => 'int'
	];

	protected $fillable = [
		'store_id',
		'member_id'
	];

	public function member()
	{
		return $this->belongsTo(Member::class);
	}

	public function store()
	{
		return $this->belongsTo(Store::class);
	}
}
