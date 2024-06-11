<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BerhakNjoptkp
 * 
 * @property string $SUBJEK_PAJAK_ID
 * @property string|null $NOP
 * @property int $JML
 * @property string $KD_PROPINSI
 * @property string $KD_DATI2
 * @property string $KD_KECAMATAN
 * @property string $KD_KELURAHAN
 * @property string $KD_BLOK
 * @property string $NO_URUT
 * @property string $KD_JNS_OP
 *
 * @package App\Models
 */
class BerhakNjoptkp extends Model
{
	protected $table = 'berhak_njoptkp';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'JML' => 'int'
	];

	protected $fillable = [
		'SUBJEK_PAJAK_ID',
		'NOP',
		'JML'
	];
}
