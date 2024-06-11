<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RefDokumenPelayanan
 * 
 * @property int $id
 * @property string|null $name
 *
 * @package App\Models
 */
class RefDokumenPelayanan extends Model
{
	protected $table = 'ref_dokumen_pelayanan';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int'
	];

	protected $fillable = [
		'name'
	];
}
