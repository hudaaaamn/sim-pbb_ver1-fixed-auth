<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PelayananLampiranKolektif
 * 
 * @property int $ID
 * @property string $NO_PELAYANAN
 * @property string|null $NOP
 * @property string|null $NAMA
 * @property string|null $ALAMAT
 * @property float|null $LT
 * @property float|null $LB
 * @property string|null $KETERANGAN
 *
 * @package App\Models
 */
class PelayananLampiranKolektif extends Model
{
	protected $table = 'pelayanan_lampiran_kolektif';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $casts = [
		'LT' => 'float',
		'LB' => 'float'
	];

	protected $fillable = [
		'NO_PELAYANAN',
		'NOP',
		'NAMA',
		'ALAMAT',
		'LT',
		'LB',
		'KETERANGAN'
	];
}
