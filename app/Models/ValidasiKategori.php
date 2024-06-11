<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ValidasiKategori
 * 
 * @property int $kategori_id
 * @property string|null $kategori_nama
 *
 * @package App\Models
 */
class ValidasiKategori extends Model
{
	protected $table = 'validasi_kategori';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'kategori_id' => 'int'
	];

	protected $fillable = [
		'kategori_id',
		'kategori_nama'
	];
}
