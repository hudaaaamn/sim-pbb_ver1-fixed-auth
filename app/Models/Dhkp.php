<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Dhkp
 * 
 * @property string $KD_PROPINSI
 * @property string $KD_DATI2
 * @property string $KD_KECAMATAN
 * @property string $KD_KELURAHAN
 * @property string $KD_BLOK
 * @property string $NO_URUT
 * @property string $KD_JNS_OP
 * @property string $THN_PAJAK_SPPT
 * @property string|null $NM_WP_SPPT
 * @property int|null $LUAS_BUMI_SPPT
 * @property int|null $LUAS_BNG_SPPT
 * @property int|null $NJOP_BUMI_SPPT
 * @property int|null $NJOP_BNG_SPPT
 * @property int|null $NJOPTKP_SPPT
 * @property string|null $ALAMAT_WP_SPPT
 * @property string|null $ALAMAT_OP_SPPT
 * @property int|null $PBB_TERHUTANG
 *
 * @package App\Models
 */
class Dhkp extends Model
{
	protected $table = 'dhkp';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'LUAS_BUMI_SPPT' => 'int',
		'LUAS_BNG_SPPT' => 'int',
		'NJOP_BUMI_SPPT' => 'int',
		'NJOP_BNG_SPPT' => 'int',
		'NJOPTKP_SPPT' => 'int',
		'PBB_TERHUTANG' => 'int'
	];

	protected $fillable = [
		'NM_WP_SPPT',
		'LUAS_BUMI_SPPT',
		'LUAS_BNG_SPPT',
		'NJOP_BUMI_SPPT',
		'NJOP_BNG_SPPT',
		'NJOPTKP_SPPT',
		'ALAMAT_WP_SPPT',
		'ALAMAT_OP_SPPT',
		'PBB_TERHUTANG'
	];
}
