<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RefJnsPelayanan
 * 
 * @property string|null $KD_JNS_PELAYANAN
 * @property string|null $NM_JENIS_PELAYANAN
 *
 * @package App\Models
 */
class RefJnsPelayanan extends Model
{
	protected $table = 'ref_jns_pelayanan';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'KD_JNS_PELAYANAN',
		'NM_JENIS_PELAYANAN'
	];
}
