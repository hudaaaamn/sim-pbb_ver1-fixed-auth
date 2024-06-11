<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class LookupItem
 * 
 * @property string $KD_LOOKUP_GROUP
 * @property string $KD_LOOKUP_ITEM
 * @property string|null $NM_LOOKUP_ITEM
 *
 * @package App\Models
 */
class LookupItem extends Model
{
	protected $table = 'lookup_item';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'NM_LOOKUP_ITEM'
	];
}
