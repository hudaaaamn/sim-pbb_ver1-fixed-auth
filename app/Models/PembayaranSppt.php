<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;

/**
 * Class PembayaranSppt
 * 
 * @property string $KD_PROPINSI
 * @property string $KD_DATI2
 * @property string $KD_KECAMATAN
 * @property string $KD_KELURAHAN
 * @property string $KD_BLOK
 * @property string $NO_URUT
 * @property string $KD_JNS_OP
 * @property string $THN_PAJAK_SPPT
 * @property int $PEMBAYARAN_SPPT_KE
 * @property string $KD_KANWIL_BANK
 * @property string $KD_KPPBB_BANK
 * @property string $KD_BANK_TUNGGAL
 * @property string $KD_BANK_PERSEPSI
 * @property string $KD_TP
 * @property int|null $DENDA_SPPT
 * @property int $JML_SPPT_YG_DIBAYAR
 * @property Carbon|null $TGL_PEMBAYARAN_SPPT
 * @property Carbon $TGL_REKAM_BYR_SPPT
 * @property string $NIP_REKAM_BYR_SPPT
 * @property string|null $NO_BUKTI
 *
 * @package App\Models
 */
class PembayaranSppt extends Model
{
	protected $table = 'pembayaran_sppt';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'PEMBAYARAN_SPPT_KE' => 'int',
		'DENDA_SPPT' => 'int',
		'JML_SPPT_YG_DIBAYAR' => 'int',
		'TGL_PEMBAYARAN_SPPT' => 'datetime',
		'TGL_REKAM_BYR_SPPT' => 'datetime'
	];

	protected $fillable = [
		'DENDA_SPPT',
		'JML_SPPT_YG_DIBAYAR',
		'TGL_PEMBAYARAN_SPPT',
		'TGL_REKAM_BYR_SPPT',
		'NIP_REKAM_BYR_SPPT',
		'NO_BUKTI'
	];

	public function getDataByNOPTahun($NOP, $tahun_awal, $tahun_akhir)
    {   

        return $this->select([
                'KD_PROPINSI',
                'KD_DATI2',
                'KD_KECAMATAN',
                'KD_KELURAHAN',
                'KD_BLOK',
                'NO_URUT',
                'KD_JNS_OP',
                'THN_PAJAK_SPPT',
                'TGL_PEMBAYARAN_SPPT',
                DB::raw('SUM(DENDA_SPPT) AS DENDA_SPPT'),
                DB::raw('SUM(JML_SPPT_YG_DIBAYAR) AS JML_BAYAR')
            ])
            ->where([
                'KD_PROPINSI' => $NOP[0],
                'KD_DATI2' => $NOP[1],
                'KD_KECAMATAN' => $NOP[2],
                'KD_KELURAHAN' => $NOP[3],
                'KD_BLOK' => $NOP[4],
                'NO_URUT' => $NOP[5],
                'KD_JNS_OP' => $NOP[6],
            ])
            ->whereBetween('THN_PAJAK_SPPT', [$tahun_awal, $tahun_akhir])
            ->groupBy('KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'TGL_PEMBAYARAN_SPPT', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP', 'THN_PAJAK_SPPT')
            ->orderBy('THN_PAJAK_SPPT')
            ->get()
            ->toArray();
    }

	public function formatKeyTahun($data)
    {
        $new_data = [];
        foreach ($data as $key => $value) {
            $new_data[$value['THN_PAJAK_SPPT']] = $value;
        }
        return $new_data;
    }
}
