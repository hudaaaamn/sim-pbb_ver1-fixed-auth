<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RefDati2
 * 
 * @property string $KD_PROPINSI
 * @property string $KD_DATI2
 * @property string $NM_DATI2
 *
 * @package App\Models
 */
class RefDati2 extends Model
{
	protected $table = 'ref_dati2';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'NM_DATI2'
	];
}
