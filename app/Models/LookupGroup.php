<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class LookupGroup
 * 
 * @property string $KD_LOOKUP_GROUP
 * @property string|null $NM_LOOKUP_GROUP
 *
 * @package App\Models
 */
class LookupGroup extends Model
{
	protected $table = 'lookup_group';
	protected $primaryKey = 'KD_LOOKUP_GROUP';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'NM_LOOKUP_GROUP'
	];
}
