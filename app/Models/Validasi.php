<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Validasi
 * 
 * @property string|null $KD_PROPINSI
 * @property string|null $KD_DATI2
 * @property string|null $KD_KECAMATAN
 * @property string|null $KD_KELURAHAN
 * @property string|null $KD_BLOK
 * @property string|null $NO_URUT
 * @property string|null $KD_JNS_OP
 * @property string|null $NM_WP_SPPT
 * @property string|null $KETERANGAN
 * @property string|null $TINDAK_LANJUT
 * @property bool|null $IS_CETAK
 * @property bool|null $IS_VALIDATED
 * @property string|null $KELOMPOK
 * @property int $KATEGORI
 * @property int $VALIDASI_KE
 * @property int|null $PBB
 * @property Carbon $MODIFIED
 * @property string|null $JENIS
 * @property Carbon|null $THN_TERAKHIR
 *
 * @package App\Models
 */
class Validasi extends Model
{
	protected $table = 'validasi';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'IS_CETAK' => 'bool',
		'IS_VALIDATED' => 'bool',
		'KATEGORI' => 'int',
		'VALIDASI_KE' => 'int',
		'PBB' => 'int',
		'MODIFIED' => 'datetime',
		'THN_TERAKHIR' => 'datetime'
	];

	protected $fillable = [
		'KD_PROPINSI',
		'KD_DATI2',
		'KD_KECAMATAN',
		'KD_KELURAHAN',
		'KD_BLOK',
		'NO_URUT',
		'KD_JNS_OP',
		'NM_WP_SPPT',
		'KETERANGAN',
		'TINDAK_LANJUT',
		'IS_CETAK',
		'IS_VALIDATED',
		'KELOMPOK',
		'KATEGORI',
		'VALIDASI_KE',
		'PBB',
		'MODIFIED',
		'JENIS',
		'THN_TERAKHIR'
	];
}
