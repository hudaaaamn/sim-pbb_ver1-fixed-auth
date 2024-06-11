<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TempPelayananNeraca
 * 
 * @property string $NOP
 * @property string|null $NO_PELAYANAN
 * @property string|null $KD
 * @property string|null $KETERANGAN
 * @property string|null $CATATAN
 *
 * @package App\Models
 */
class TempPelayananNeraca extends Model
{
	protected $table = 'temp_pelayanan_neraca';
	protected $primaryKey = 'NOP';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'NO_PELAYANAN',
		'KD',
		'KETERANGAN',
		'CATATAN'
	];
}
