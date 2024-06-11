<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DatOpBangunan
 * 
 * @property string $KD_PROPINSI
 * @property string $KD_DATI2
 * @property string $KD_KECAMATAN
 * @property string $KD_KELURAHAN
 * @property string $KD_BLOK
 * @property string $NO_URUT
 * @property string $KD_JNS_OP
 * @property int $NO_BNG
 * @property string|null $KD_JPB
 * @property string|null $NO_FORMULIR_LSPOP
 * @property string $THN_DIBANGUN_BNG
 * @property string|null $THN_RENOVASI_BNG
 * @property int $LUAS_BNG
 * @property int $JML_LANTAI_BNG
 * @property string|null $KONDISI_BNG
 * @property string|null $JNS_KONSTRUKSI_BNG
 * @property string|null $JNS_ATAP_BNG
 * @property string|null $KD_DINDING
 * @property string|null $KD_LANTAI
 * @property string|null $KD_LANGIT_LANGIT
 * @property int $NILAI_SISTEM_BNG
 * @property string|null $JNS_TRANSAKSI_BNG
 * @property Carbon|null $TGL_PENDATAAN_BNG
 * @property string|null $NIP_PENDATA_BNG
 * @property Carbon|null $TGL_PEMERIKSAAN_BNG
 * @property string|null $NIP_PEMERIKSA_BNG
 * @property Carbon|null $TGL_PEREKAMAN_BNG
 * @property string|null $NIP_PEREKAM_BNG
 * @property Carbon|null $TGL_KUNJUNGAN_KEMBALI
 * @property int $NILAI_INDIVIDU
 * @property bool $AKTIF
 *
 * @package App\Models
 */
class DatOpBangunan extends Model
{
	protected $table = 'dat_op_bangunan';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'NO_BNG' => 'int',
		'LUAS_BNG' => 'int',
		'JML_LANTAI_BNG' => 'int',
		'NILAI_SISTEM_BNG' => 'int',
		'TGL_PENDATAAN_BNG' => 'datetime',
		'TGL_PEMERIKSAAN_BNG' => 'datetime',
		'TGL_PEREKAMAN_BNG' => 'datetime',
		'TGL_KUNJUNGAN_KEMBALI' => 'datetime',
		'NILAI_INDIVIDU' => 'int',
		'AKTIF' => 'bool'
	];

	protected $fillable = [
		'KD_JPB',
		'NO_FORMULIR_LSPOP',
		'THN_DIBANGUN_BNG',
		'THN_RENOVASI_BNG',
		'LUAS_BNG',
		'JML_LANTAI_BNG',
		'KONDISI_BNG',
		'JNS_KONSTRUKSI_BNG',
		'JNS_ATAP_BNG',
		'KD_DINDING',
		'KD_LANTAI',
		'KD_LANGIT_LANGIT',
		'NILAI_SISTEM_BNG',
		'JNS_TRANSAKSI_BNG',
		'TGL_PENDATAAN_BNG',
		'NIP_PENDATA_BNG',
		'TGL_PEMERIKSAAN_BNG',
		'NIP_PEMERIKSA_BNG',
		'TGL_PEREKAMAN_BNG',
		'NIP_PEREKAM_BNG',
		'TGL_KUNJUNGAN_KEMBALI',
		'NILAI_INDIVIDU',
		'AKTIF'
	];
}
