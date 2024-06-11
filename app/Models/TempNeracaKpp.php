<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TempNeracaKpp
 * 
 * @property string $NOP
 * @property string|null $NAMA
 * @property float|null $KETETAPAN
 * @property float|null $POKOK_BAYAR
 * @property float|null $DENDA_BAYAR
 * @property string|null $TGL_BAYAR
 * @property float|null $SISA_PIUTANG
 * @property float|null $PENYISIHAN
 * @property float|null $NETTO
 *
 * @package App\Models
 */
class TempNeracaKpp extends Model
{
	protected $table = 'temp_neraca_kpp';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'KETETAPAN' => 'float',
		'POKOK_BAYAR' => 'float',
		'DENDA_BAYAR' => 'float',
		'SISA_PIUTANG' => 'float',
		'PENYISIHAN' => 'float',
		'NETTO' => 'float'
	];

	protected $fillable = [
		'NOP',
		'NAMA',
		'KETETAPAN',
		'POKOK_BAYAR',
		'DENDA_BAYAR',
		'TGL_BAYAR',
		'SISA_PIUTANG',
		'PENYISIHAN',
		'NETTO'
	];
}
