<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TempLaporanPelayanan
 * 
 * @property string|null $NO_PELAYANAN
 * @property string|null $KD
 * @property string|null $KETERANGAN
 * @property string|null $CATATAN
 * @property Carbon|null $TGL
 * @property string|null $NAMA_SEBELUM
 * @property string|null $NOP_SEBELUM
 * @property int|null $LT_SEBELUM
 * @property int|null $LB_SEBELUM
 * @property int|null $KETETAPAN_LAMA
 * @property string|null $NAMA_BARU
 * @property string|null $NOP_BARU
 * @property int|null $LT_BARU
 * @property int|null $LB_BARU
 * @property int|null $KETETAPAN_BARU
 * @property int|null $SELISIH_KETETAPAN
 *
 * @package App\Models
 */
class TempLaporanPelayanan extends Model
{
	protected $table = 'temp_laporan_pelayanan';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'TGL' => 'datetime',
		'LT_SEBELUM' => 'int',
		'LB_SEBELUM' => 'int',
		'KETETAPAN_LAMA' => 'int',
		'LT_BARU' => 'int',
		'LB_BARU' => 'int',
		'KETETAPAN_BARU' => 'int',
		'SELISIH_KETETAPAN' => 'int'
	];

	protected $fillable = [
		'NO_PELAYANAN',
		'KD',
		'KETERANGAN',
		'CATATAN',
		'TGL',
		'NAMA_SEBELUM',
		'NOP_SEBELUM',
		'LT_SEBELUM',
		'LB_SEBELUM',
		'KETETAPAN_LAMA',
		'NAMA_BARU',
		'NOP_BARU',
		'LT_BARU',
		'LB_BARU',
		'KETETAPAN_BARU',
		'SELISIH_KETETAPAN'
	];
}
