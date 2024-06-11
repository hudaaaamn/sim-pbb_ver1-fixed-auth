<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Thiagoprz\CompositeKey\HasCompositeKey;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Spop
 * 
 * @property string $KD_PROPINSI
 * @property string $KD_DATI2
 * @property string $KD_KECAMATAN
 * @property string $KD_KELURAHAN
 * @property string $KD_BLOK
 * @property string $NO_URUT
 * @property string $KD_JNS_OP
 * @property string $SUBJEK_PAJAK_ID
 * @property string|null $NO_FORMULIR_SPOP
 * @property string $JNS_TRANSAKSI_OP
 * @property string|null $KD_PROPINSI_BERSAMA
 * @property string|null $KD_DATI2_BERSAMA
 * @property string|null $KD_KECAMATAN_BERSAMA
 * @property string|null $KD_KELURAHAN_BERSAMA
 * @property string|null $KD_BLOK_BERSAMA
 * @property string|null $NO_URUT_BERSAMA
 * @property string|null $KD_JNS_OP_BERSAMA
 * @property string|null $KD_PROPINSI_ASAL
 * @property string|null $KD_DATI2_ASAL
 * @property string|null $KD_KECAMATAN_ASAL
 * @property string|null $KD_KELURAHAN_ASAL
 * @property string|null $KD_BLOK_ASAL
 * @property string|null $NO_URUT_ASAL
 * @property string|null $KD_JNS_OP_ASAL
 * @property string|null $NO_SPPT_LAMA
 * @property string $JALAN_OP
 * @property string|null $BLOK_KAV_NO_OP
 * @property string|null $KELURAHAN_OP
 * @property string|null $RW_OP
 * @property string|null $RT_OP
 * @property string $KD_STATUS_WP
 * @property int $LUAS_BUMI
 * @property string|null $KD_ZNT
 * @property string $JNS_BUMI
 * @property int $NILAI_SISTEM_BUMI
 * @property Carbon $TGL_PENDATAAN_OP
 * @property string|null $NM_PENDATAAN_OP
 * @property string|null $NIP_PENDATA
 * @property Carbon $TGL_PEMERIKSAAN_OP
 * @property string|null $NM_PEMERIKSAAN_OP
 * @property string|null $NIP_PEMERIKSA_OP
 * @property string|null $NO_PERSIL
 *
 * @package App\Models
 */
class Spop extends Model
{
	// use HasCompositeKey;
	use HasFactory;

	
	protected $table = 'spop';
	public $incrementing = false;
	public $timestamps = false;

	protected $primaryKey = ['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP'];

	protected $casts = [
		'LUAS_BUMI' => 'int',
		'NILAI_SISTEM_BUMI' => 'int',
		'TGL_PENDATAAN_OP' => 'datetime',
		'TGL_PEMERIKSAAN_OP' => 'datetime'
	];

	// protected $fillable = [
	// 	'SUBJEK_PAJAK_ID',
	// 	'NO_FORMULIR_SPOP',
	// 	'JNS_TRANSAKSI_OP',
	// 	'KD_PROPINSI_BERSAMA',
	// 	'KD_DATI2_BERSAMA',
	// 	'KD_KECAMATAN_BERSAMA',
	// 	'KD_KELURAHAN_BERSAMA',
	// 	'KD_BLOK_BERSAMA',
	// 	'NO_URUT_BERSAMA',
	// 	'KD_JNS_OP_BERSAMA',
	// 	'KD_PROPINSI_ASAL',
	// 	'KD_DATI2_ASAL',
	// 	'KD_KECAMATAN_ASAL',
	// 	'KD_KELURAHAN_ASAL',
	// 	'KD_BLOK_ASAL',
	// 	'NO_URUT_ASAL',
	// 	'KD_JNS_OP_ASAL',
	// 	'NO_SPPT_LAMA',
	// 	'JALAN_OP',
	// 	'BLOK_KAV_NO_OP',
	// 	'KELURAHAN_OP',
	// 	'RW_OP',
	// 	'RT_OP',
	// 	'KD_STATUS_WP',
	// 	'LUAS_BUMI',
	// 	'KD_ZNT',
	// 	'JNS_BUMI',
	// 	'NILAI_SISTEM_BUMI',
	// 	'TGL_PENDATAAN_OP',
	// 	'NM_PENDATAAN_OP',
	// 	'NIP_PENDATA',
	// 	'TGL_PEMERIKSAAN_OP',
	// 	'NM_PEMERIKSAAN_OP',
	// 	'NIP_PEMERIKSA_OP',
	// 	'NO_PERSIL'
	// ];
	protected $fillable = [
        'jenis_transaksi',
        'nop',
        'nop_bersama',
        'nop_asal',
        'no_sppt_lama',
        'jalan',
        'rt',
        'rw',
        'no',
        'kelurahan',
        'nomor_legalitas',
        'nik',
        'nama',
        'npwp',
        'alamat',
        'rw_alamat',
        'rt_alamat',
        'no_alamat',
        'kode_pos',
        'kelurahan_alamat',
        'status',
        'pekerjaan',
    ];
	public function rules()
    {
        return [
            [['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP', 'SUBJEK_PAJAK_ID', 'JNS_TRANSAKSI_OP', 'JALAN_OP', 'KD_STATUS_WP', 'LUAS_BUMI', 'JNS_BUMI', 'TGL_PENDATAAN_OP', 'TGL_PEMERIKSAAN_OP'], 'required'],
            [['LUAS_BUMI', 'NILAI_SISTEM_BUMI'], 'integer'],
            [['TGL_PENDATAAN_OP', 'TGL_PEMERIKSAAN_OP'], 'safe'],
            [['KD_PROPINSI', 'KD_DATI2', 'KD_PROPINSI_BERSAMA', 'KD_DATI2_BERSAMA', 'KD_PROPINSI_ASAL', 'KD_DATI2_ASAL', 'RW_OP', 'KD_ZNT'], 'string', 'max' => 2],
            [['KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'KD_KECAMATAN_BERSAMA', 'KD_KELURAHAN_BERSAMA', 'KD_BLOK_BERSAMA', 'KD_KECAMATAN_ASAL', 'KD_KELURAHAN_ASAL', 'KD_BLOK_ASAL', 'RT_OP'], 'string', 'max' => 3],
            [['NO_URUT', 'NO_URUT_BERSAMA', 'NO_URUT_ASAL', 'NO_SPPT_LAMA'], 'string', 'max' => 4],
            [['KD_JNS_OP', 'JNS_TRANSAKSI_OP', 'KD_JNS_OP_BERSAMA', 'KD_JNS_OP_ASAL', 'KD_STATUS_WP', 'JNS_BUMI'], 'string', 'max' => 1],
            [['SUBJEK_PAJAK_ID', 'JALAN_OP', 'KELURAHAN_OP', 'NM_PENDATAAN_OP', 'NM_PEMERIKSAAN_OP'], 'string', 'max' => 30],
            [['NO_FORMULIR_SPOP'], 'string', 'max' => 11],
            [['BLOK_KAV_NO_OP'], 'string', 'max' => 15],
            [['NIP_PENDATA', 'NIP_PEMERIKSA_OP'], 'string', 'max' => 20],
            [['NO_PERSIL'], 'string', 'max' => 5],
            [['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP'], 'unique', 'targetAttribute' => ['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP']],
            [['NOP'], 'string', 'max' => 18],
        ];
    }
	public function getDataBySubjekId($SUBJEK_PAJAK_ID)
    {
        return $this->where('SUBJEK_PAJAK_ID', $SUBJEK_PAJAK_ID)
            ->get()
            ->toArray();
    }

	public function getDataByNOP($NOP)
    {
        return $this->where([
                'KD_PROPINSI' => $NOP[0],
                'KD_DATI2' => $NOP[1],
                'KD_KECAMATAN' => $NOP[2],
                'KD_KELURAHAN' => $NOP[3],
                'KD_BLOK' => $NOP[4],
                'NO_URUT' => $NOP[5],
                'KD_JNS_OP' => $NOP[6],
            ])
            ->get()
            ->toArray();
    }
}
