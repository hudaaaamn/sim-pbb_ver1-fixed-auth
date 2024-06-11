<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RefPropinsi
 * 
 * @property string $KD_PROPINSI
 * @property string $NM_PROPINSI
 *
 * @package App\Models
 */
class RefPropinsi extends Model
{
	protected $table = 'ref_propinsi';
	protected $primaryKey = 'KD_PROPINSI';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'NM_PROPINSI'
	];
}
