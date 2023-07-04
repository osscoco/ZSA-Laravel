<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Store
 * 
 * @property int $id
 * @property string $reference
 * @property string $urlwebsite
 * @property Carbon $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Member[] $members
 *
 * @package App\Models
 */
class Store extends Model
{
	protected $table = 'stores';

	protected $fillable = [
		'reference',
		'urlwebsite'
	];

	public function members()
	{
		return $this->belongsToMany(Member::class, 'store_members')
					->withPivot('id')
					->withTimestamps();
	}
}
