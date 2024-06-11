<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DatSubjekPajak
 * 
 * @property string $SUBJEK_PAJAK_ID
 * @property string $NM_WP
 * @property string $JALAN_WP
 * @property string|null $BLOK_KAV_NO_WP
 * @property string|null $RW_WP
 * @property string|null $RT_WP
 * @property string|null $KELURAHAN_WP
 * @property string|null $KOTA_WP
 * @property string|null $KD_POS_WP
 * @property string|null $TELP_WP
 * @property string|null $NPWP
 * @property string $STATUS_PEKERJAAN_WP
 * @property string|null $EMAIL_WP
 *
 * @package App\Models
 */
class DatSubjekPajak extends Model
{
	protected $table = 'dat_subjek_pajak';
	protected $primaryKey = 'SUBJEK_PAJAK_ID';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'NM_WP',
		'JALAN_WP',
		'BLOK_KAV_NO_WP',
		'RW_WP',
		'RT_WP',
		'KELURAHAN_WP',
		'KOTA_WP',
		'KD_POS_WP',
		'TELP_WP',
		'NPWP',
		'STATUS_PEKERJAAN_WP',
		'EMAIL_WP'
	];

	public function getDataBySubjekId($SUBJEK_PAJAK_ID)
    {
        return $this->where('SUBJEK_PAJAK_ID', $SUBJEK_PAJAK_ID)
            ->get()
            ->toArray();
    }
}
