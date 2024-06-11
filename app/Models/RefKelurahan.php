<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RefKelurahan
 * 
 * @property string $KD_PROPINSI
 * @property string $KD_DATI2
 * @property string $KD_KECAMATAN
 * @property string $KD_KELURAHAN
 * @property string $KD_SEKTOR
 * @property string $NM_KELURAHAN
 * @property int|null $NO_KELURAHAN
 * @property string|null $KD_POS_KELURAHAN
 *
 * @package App\Models
 */
class RefKelurahan extends Model
{
	protected $table = 'ref_kelurahan';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'NO_KELURAHAN' => 'int'
	];

	protected $fillable = [
		'KD_SEKTOR',
		'NM_KELURAHAN',
		'NO_KELURAHAN',
		'KD_POS_KELURAHAN'
	];


	public function getKelurahanGroup()
    {
        $kelurahan = $this->select("KD_KECAMATAN", "KD_KELURAHAN", "NM_KELURAHAN")->get()->toArray();
        $new_kelurahan = [];

        foreach ($kelurahan as $key => $value) {
            $new_kelurahan[$value['KD_KECAMATAN']][$value['KD_KELURAHAN']] = $value['NM_KELURAHAN'];
        }

        return $new_kelurahan;
    }
}
