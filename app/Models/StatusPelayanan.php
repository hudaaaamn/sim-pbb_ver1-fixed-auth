<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class StatusPelayanan
 * 
 * @property int $id
 * @property string|null $nama
 * @property int|null $urutan
 *
 * @package App\Models
 */
class StatusPelayanan extends Model
{
	protected $table = 'status_pelayanan';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'urutan' => 'int'
	];

	protected $fillable = [
		'nama',
		'urutan'
	];
}
