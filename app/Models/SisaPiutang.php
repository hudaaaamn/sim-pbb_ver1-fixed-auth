<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SisaPiutang
 * 
 * @property Carbon $THN_NERACA
 * @property Carbon $THN_PIUTANG
 * @property int|null $TOTAL
 * @property int|null $PENYISIHAN
 *
 * @package App\Models
 */
class SisaPiutang extends Model
{
	protected $table = 'sisa_piutang';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'THN_NERACA' => 'datetime',
		'THN_PIUTANG' => 'datetime',
		'TOTAL' => 'int',
		'PENYISIHAN' => 'int'
	];

	protected $fillable = [
		'THN_NERACA',
		'THN_PIUTANG',
		'TOTAL',
		'PENYISIHAN'
	];
}
