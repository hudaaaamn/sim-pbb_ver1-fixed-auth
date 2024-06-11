<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class KelasBangunan
 * 
 * @property string $KELAS_BANGUNAN
 * @property float $NILAI_MINIMUM
 * @property float $NILAI_MAKSIMUM
 * @property float $NJOP_BANGUNAN
 *
 * @package App\Models
 */
class KelasBangunan extends Model
{
	protected $table = 'kelas_bangunan';
	protected $primaryKey = 'KELAS_BANGUNAN';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'NILAI_MINIMUM' => 'float',
		'NILAI_MAKSIMUM' => 'float',
		'NJOP_BANGUNAN' => 'float'
	];

	protected $fillable = [
		'NILAI_MINIMUM',
		'NILAI_MAKSIMUM',
		'NJOP_BANGUNAN'
	];
}
