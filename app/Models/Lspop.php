<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Lspop
 * 
 * @property string $KD_PROPINSI
 * @property string $KD_DATI2
 * @property string $KD_KECAMATAN
 * @property string $KD_KELURAHAN
 * @property string $KD_BLOK
 * @property string $NO_URUT
 * @property string $KD_JNS_OP
 * @property int $NO_BNG
 * @property string|null $NO_FORMULIR_LSPOP
 * @property string|null $JNS_TRANSAKSI_BNG
 * @property string|null $KD_JPB
 * @property int $LUAS_BNG
 * @property int $JML_LANTAI_BNG
 * @property string $THN_DIBANGUN_BNG
 * @property string|null $THN_RENOVASI_BNG
 * @property string|null $KONDISI_BNG
 * @property string|null $JNS_KONSTRUKSI_BNG
 * @property string|null $JNS_ATAP_BNG
 * @property string|null $KD_DINDING
 * @property string|null $KD_LANTAI
 * @property string|null $KD_LANGIT_LANGIT
 * @property int $TING_KOLOM_JPB3
 * @property int $LBR_BENT_JPB3
 * @property int $DAYA_DUKUNG_LANTAI_JPB3
 * @property int $KELILING_DINDING_JPB3
 * @property int $LUAS_MEZZANINE_JPB3
 * @property int $KLS_JPB2
 * @property int $KLS_JPB4
 * @property int $KLS_JPB5
 * @property int $LUAS_KMR_JPB5_DGN_AC_SENT
 * @property int $LUAS_RNG_LAIN_JPB5_DGN_AC_SENT
 * @property int $KLS_JPB6
 * @property int $JNS_JPB7
 * @property int $BINTANG_JPB7
 * @property int $JML_KMR_JPB7
 * @property int $LUAS_KMR_JPB7_DGN_AC_SENT
 * @property int $LUAS_KMR_LAIN_JPB7_DGN_AC_SENT
 * @property int $TYPE_JPB12
 * @property int $KLS_JPB13
 * @property int $JML_JPB13
 * @property int $LUAS_JPB13_DGN_AC_SENT
 * @property int $LUAS_JPB13_LAIN_DGN_AC_SENT
 * @property int $KAPASITAS_TANGKI_JPB15
 * @property int $LETAK_TANGKI_JPB15
 * @property int $KLS_JPB16
 * @property int $NILAI_SISTEM_BNG
 * @property int $NILAI_FORMULA
 * @property int $NILAI_INDIVIDU
 * @property Carbon|null $TGL_KUNJUNGAN_KEMBALI
 * @property Carbon|null $TGL_PENDATAAN_BNG
 * @property string $NM_PENDATAAN_OP
 * @property string|null $NIP_PENDATA_BNG
 * @property Carbon|null $TGL_PEMERIKSAAN_BNG
 * @property string $NM_PEMERIKSAAN_OP
 * @property string|null $NIP_PEMERIKSA_BNG
 * @property Carbon|null $TGL_PEREKAMAN_BNG
 * @property string|null $NIP_PEREKAM_BNG
 * @property bool $AKTIF
 *
 * @package App\Models
 */
class Lspop extends Model
{
    protected $table = 'lspop';
    public $timestamps = false;
    // protected $primaryKey = ['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP'];

    // protected $casts = [
    //     'LUAS_BUMI' => 'int',
    //     'NILAI_SISTEM_BUMI' => 'int',
    //     'TGL_PENDATAAN_OP' => 'datetime',
    //     'TGL_PEMERIKSAAN_OP' => 'datetime'
    // ];

    protected $fillable = [
        'nop',
        'tgl_kunjungan_kembali',
        'jenis_transaksi',
        'nomor_formulir',
        'bgn_total',
        'bgn_tgl_pendataan',
        'bgn_individual',
        'bgn_nip_pendata',
        'bgn_luas',
        'bgn_kontruksi',
        'bgn_dinding',
        'bgn_jml_lantai',
        'bgn_langit_langit',
        'bgn_lantai',
        'bgn_kondisi',
        'bgn_atap',
        'bgn_listrik',
    ];

    // public function rules()
    // {
    //     return [
    //         [['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP', 'SUBJEK_PAJAK_ID', 'JNS_TRANSAKSI_OP', 'JALAN_OP', 'KD_STATUS_WP', 'LUAS_BUMI', 'JNS_BUMI', 'TGL_PENDATAAN_OP', 'TGL_PEMERIKSAAN_OP'], 'required'],
    //         [['LUAS_BUMI', 'NILAI_SISTEM_BUMI'], 'integer'],
    //         [['TGL_PENDATAAN_OP', 'TGL_PEMERIKSAAN_OP'], 'safe'],
    //         [['KD_PROPINSI', 'KD_DATI2', 'KD_PROPINSI_BERSAMA', 'KD_DATI2_BERSAMA', 'KD_PROPINSI_ASAL', 'KD_DATI2_ASAL', 'RW_OP', 'KD_ZNT'], 'string', 'max' => 2],
    //         [['KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'KD_KECAMATAN_BERSAMA', 'KD_KELURAHAN_BERSAMA', 'KD_BLOK_BERSAMA', 'KD_KECAMATAN_ASAL', 'KD_KELURAHAN_ASAL', 'KD_BLOK_ASAL', 'RT_OP'], 'string', 'max' => 3],
    //         [['NO_URUT', 'NO_URUT_BERSAMA', 'NO_URUT_ASAL', 'NO_SPPT_LAMA'], 'string', 'max' => 4],
    //         [['KD_JNS_OP', 'JNS_TRANSAKSI_OP', 'KD_JNS_OP_BERSAMA', 'KD_JNS_OP_ASAL', 'KD_STATUS_WP', 'JNS_BUMI'], 'string', 'max' => 1],
    //         [['SUBJEK_PAJAK_ID', 'JALAN_OP', 'KELURAHAN_OP', 'NM_PENDATAAN_OP', 'NM_PEMERIKSAAN_OP'], 'string', 'max' => 30],
    //         [['NO_FORMULIR_SPOP'], 'string', 'max' => 11],
    //         [['BLOK_KAV_NO_OP'], 'string', 'max' => 15],
    //         [['NIP_PENDATA', 'NIP_PEMERIKSA_OP'], 'string', 'max' => 20],
    //         [['NO_PERSIL'], 'string', 'max' => 5],
    //         [['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP'], 'unique', 'targetAttribute' => ['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP']],
    //         [['NOP'], 'string', 'max' => 18],
    //     ];
    // }
    // public function getDataBySubjekId($SUBJEK_PAJAK_ID)
    // {
    //     return $this->where('SUBJEK_PAJAK_ID', $SUBJEK_PAJAK_ID)
    //         ->get()
    //         ->toArray();
    // }

    // public function getDataByNOP($NOP)
    // {
    //     return $this->where([
    //         'KD_PROPINSI' => $NOP[0],
    //         'KD_DATI2' => $NOP[1],
    //         'KD_KECAMATAN' => $NOP[2],
    //         'KD_KELURAHAN' => $NOP[3],
    //         'KD_BLOK' => $NOP[4],
    //         'NO_URUT' => $NOP[5],
    //         'KD_JNS_OP' => $NOP[6],
    //     ])
    //         ->get()
    //         ->toArray();
    // }
}

// 	protected $casts = [
// 		'NO_BNG' => 'int',
// 		'LUAS_BNG' => 'int',
// 		'JML_LANTAI_BNG' => 'int',
// 		'TING_KOLOM_JPB3' => 'int',
// 		'LBR_BENT_JPB3' => 'int',
// 		'DAYA_DUKUNG_LANTAI_JPB3' => 'int',
// 		'KELILING_DINDING_JPB3' => 'int',
// 		'LUAS_MEZZANINE_JPB3' => 'int',
// 		'KLS_JPB2' => 'int',
// 		'KLS_JPB4' => 'int',
// 		'KLS_JPB5' => 'int',
// 		'LUAS_KMR_JPB5_DGN_AC_SENT' => 'int',
// 		'LUAS_RNG_LAIN_JPB5_DGN_AC_SENT' => 'int',
// 		'KLS_JPB6' => 'int',
// 		'JNS_JPB7' => 'int',
// 		'BINTANG_JPB7' => 'int',
// 		'JML_KMR_JPB7' => 'int',
// 		'LUAS_KMR_JPB7_DGN_AC_SENT' => 'int',
// 		'LUAS_KMR_LAIN_JPB7_DGN_AC_SENT' => 'int',
// 		'TYPE_JPB12' => 'int',
// 		'KLS_JPB13' => 'int',
// 		'JML_JPB13' => 'int',
// 		'LUAS_JPB13_DGN_AC_SENT' => 'int',
// 		'LUAS_JPB13_LAIN_DGN_AC_SENT' => 'int',
// 		'KAPASITAS_TANGKI_JPB15' => 'int',
// 		'LETAK_TANGKI_JPB15' => 'int',
// 		'KLS_JPB16' => 'int',
// 		'NILAI_SISTEM_BNG' => 'int',
// 		'NILAI_FORMULA' => 'int',
// 		'NILAI_INDIVIDU' => 'int',
// 		'TGL_KUNJUNGAN_KEMBALI' => 'datetime',
// 		'TGL_PENDATAAN_BNG' => 'datetime',
// 		'TGL_PEMERIKSAAN_BNG' => 'datetime',
// 		'TGL_PEREKAMAN_BNG' => 'datetime',
// 		'AKTIF' => 'bool'
// 	];

// 	protected $fillable = [
// 		'KD_PROPINSI',
// 		'KD_DATI2',
// 		'KD_KECAMATAN',
// 		'KD_KELURAHAN',
// 		'KD_BLOK',
// 		'NO_URUT',
// 		'KD_JNS_OP',
// 		'NO_BNG',
// 		'NO_FORMULIR_LSPOP',
// 		'JNS_TRANSAKSI_BNG',
// 		'KD_JPB',
// 		'LUAS_BNG',
// 		'JML_LANTAI_BNG',
// 		'THN_DIBANGUN_BNG',
// 		'THN_RENOVASI_BNG',
// 		'KONDISI_BNG',
// 		'JNS_KONSTRUKSI_BNG',
// 		'JNS_ATAP_BNG',
// 		'KD_DINDING',
// 		'KD_LANTAI',
// 		'KD_LANGIT_LANGIT',
// 		'TING_KOLOM_JPB3',
// 		'LBR_BENT_JPB3',
// 		'DAYA_DUKUNG_LANTAI_JPB3',
// 		'KELILING_DINDING_JPB3',
// 		'LUAS_MEZZANINE_JPB3',
// 		'KLS_JPB2',
// 		'KLS_JPB4',
// 		'KLS_JPB5',
// 		'LUAS_KMR_JPB5_DGN_AC_SENT',
// 		'LUAS_RNG_LAIN_JPB5_DGN_AC_SENT',
// 		'KLS_JPB6',
// 		'JNS_JPB7',
// 		'BINTANG_JPB7',
// 		'JML_KMR_JPB7',
// 		'LUAS_KMR_JPB7_DGN_AC_SENT',
// 		'LUAS_KMR_LAIN_JPB7_DGN_AC_SENT',
// 		'TYPE_JPB12',
// 		'KLS_JPB13',
// 		'JML_JPB13',
// 		'LUAS_JPB13_DGN_AC_SENT',
// 		'LUAS_JPB13_LAIN_DGN_AC_SENT',
// 		'KAPASITAS_TANGKI_JPB15',
// 		'LETAK_TANGKI_JPB15',
// 		'KLS_JPB16',
// 		'NILAI_SISTEM_BNG',
// 		'NILAI_FORMULA',
// 		'NILAI_INDIVIDU',
// 		'TGL_KUNJUNGAN_KEMBALI',
// 		'TGL_PENDATAAN_BNG',
// 		'NM_PENDATAAN_OP',
// 		'NIP_PENDATA_BNG',
// 		'TGL_PEMERIKSAAN_BNG',
// 		'NM_PEMERIKSAAN_OP',
// 		'NIP_PEMERIKSA_BNG',
// 		'TGL_PEREKAMAN_BNG',
// 		'NIP_PEREKAM_BNG',
// 		'AKTIF'
// 	];
// }
