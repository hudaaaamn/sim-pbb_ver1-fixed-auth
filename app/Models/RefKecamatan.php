<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RefKecamatan
 * 
 * @property string $KD_PROPINSI
 * @property string $KD_DATI2
 * @property string $KD_KECAMATAN
 * @property string $NM_KECAMATAN
 *
 * @package App\Models
 */
class RefKecamatan extends Model
{
	protected $table = 'ref_kecamatan';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'NM_KECAMATAN'
	];
}
