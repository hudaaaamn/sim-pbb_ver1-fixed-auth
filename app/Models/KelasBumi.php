<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class KelasBumi
 * 
 * @property string $KELAS_BUMI
 * @property float $NILAI_MINIMUM
 * @property float $NILAI_MAKSIMUM
 * @property float $NJOP_BUMI
 *
 * @package App\Models
 */
class KelasBumi extends Model
{
	protected $table = 'kelas_bumi';
	protected $primaryKey = 'KELAS_BUMI';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'NILAI_MINIMUM' => 'float',
		'NILAI_MAKSIMUM' => 'float',
		'NJOP_BUMI' => 'float'
	];

	protected $fillable = [
		'NILAI_MINIMUM',
		'NILAI_MAKSIMUM',
		'NJOP_BUMI'
	];
}
