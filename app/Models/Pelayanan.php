<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;
use Illuminate\Support\Facades\DB;

/**
 * Class Pelayanan
 * 
 * @property int $ID
 * @property string|null $NAMA_PEMOHON
 * @property string|null $ALAMAT_PEMOHON
 * @property string|null $LETAK_OP
 * @property string|null $KECAMATAN
 * @property string|null $KELURAHAN
 * @property string|null $NO_PELAYANAN
 * @property Carbon|null $TANGGAL_PELAYANAN
 * @property string|null $KD_PROPINSI
 * @property string|null $KD_DATI2
 * @property string|null $KD_KECAMATAN
 * @property string|null $KD_KELURAHAN
 * @property string|null $KD_BLOK
 * @property string|null $NO_URUT
 * @property string|null $KD_JNS_OP
 * @property string|null $KD_JNS_PELAYANAN
 * @property Carbon|null $TANGGAL_PERKIRAAN_SELESAI
 * @property int|null $STATUS_PELAYANAN
 * @property string|null $NIP_PETUGAS_PENERIMA
 * @property string|null $NAMA_PETUGAS_PENERIMA
 * @property string|null $NIP_AR
 * @property string|null $NAMA_AR
 * @property string|null $CATATAN
 * @property string|null $KETERANGAN
 * @property Carbon|null $TGL_MASUK_PENILAI
 * @property string|null $NIP_MASUK_PENILAI
 * @property Carbon|null $TGL_SELESAI
 * @property string|null $NIP_SELESAI
 * @property Carbon|null $TGL_TERKONFIRMASI_WP
 * @property string|null $NIP_TERKONFIRMASI_WP
 * @property Carbon|null $TGL_PENETAPAN
 * @property string|null $NIP_PENETAPAN
 * @property Carbon|null $TGL_BERKAS_DITUNDA
 * @property string|null $NIP_BERKAS_DITUNDA
 * @property string|null $TTD_JABATAN_KIRI
 * @property string|null $TTD_NAMA_KIRI
 * @property string|null $TTD_NIP_KIRI
 * @property string|null $TTD_JABATAN_KANAN
 * @property string|null $TTD_NAMA_KANAN
 * @property string|null $TTD_NIP_KANAN
 * @property string|null $KETERANGAN_BERKAS
 *
 * @package App\Models
 */
class Pelayanan extends Model
{
	protected $table = 'pelayanan';
	public $incrementing = false;
	public $timestamps = false;

	protected function serializeDate(DateTimeInterface $date){
		return $date->format('Y-m-d');
	}

	/**
     * Transform the model attributes to a specific JSON format.
     *
     * @return array
     */
    public function toJsonFormat()
    {
        return [
			'ID' => $this->ID,  // Replace "id" with the actual column name
			'NO_PELAYANAN' => $this->NO_PELAYANAN,
			'NAMA_PEMOHON' => $this->NAMA_PEMOHON,
			'TANGGAL_PELAYANAN' => $this->TANGGAL_PELAYANAN,
			'KECAMATAN' => $this->KECAMATAN,
			'KELURAHAN' => $this->KELURAHAN,
			'KD_BLOK' => $this->KD_BLOK,
			'NO_URUT' => $this->NO_URUT,
			'KD_JNS_PELAYANAN' => $this->KD_JNS_PELAYANAN,
			'STATUS_PELAYANAN' => $this->STATUS_PELAYANAN,
			'KETERANGAN_BERKAS' => $this->KETERANGAN_BERKAS,
        ];
    }


	public static $rules = [
        'NO_PELAYANAN' => 'required|string|max:13',
        'TANGGAL_PELAYANAN' => 'sometimes|date',
        'TANGGAL_PERKIRAAN_SELESAI' => 'sometimes|date',
        'TGL_MASUK_PENILAI' => 'sometimes|date',
        'TGL_SELESAI' => 'sometimes|date',
        'TGL_TERKONFIRMASI_WP' => 'sometimes|date',
        'TGL_PENETAPAN' => 'sometimes|date',
        'TGL_BERKAS_DITUNDA' => 'sometimes|date',
        'STATUS_PELAYANAN' => 'sometimes|integer',
        'CATATAN' => 'nullable|string',
        'KETERANGAN' => 'nullable|string',
        'NAMA_PEMOHON' => 'nullable|string|max:300',
        'NIP_PETUGAS_PENERIMA' => 'nullable|string|max:300',
        'NAMA_PETUGAS_PENERIMA' => 'nullable|string|max:300',
        'NIP_AR' => 'nullable|string|max:300',
        'NAMA_AR' => 'nullable|string|max:300',
        'NIP_MASUK_PENILAI' => 'nullable|string|max:300',
        'NIP_SELESAI' => 'nullable|string|max:300',
        'NIP_TERKONFIRMASI_WP' => 'nullable|string|max:300',
        'NIP_PENETAPAN' => 'nullable|string|max:300',
        'NIP_BERKAS_DITUNDA' => 'nullable|string|max:300',
        'ALAMAT_PEMOHON' => 'nullable|string|max:500',
        'TTD_JABATAN_KIRI' => 'nullable|string|max:500',
        'TTD_NAMA_KIRI' => 'nullable|string|max:500',
        'TTD_NIP_KIRI' => 'nullable|string|max:500',
        'TTD_JABATAN_KANAN' => 'nullable|string|max:500',
        'TTD_NAMA_KANAN' => 'nullable|string|max:500',
        'TTD_NIP_KANAN' => 'nullable|string|max:500',
        'LETAK_OP' => 'nullable|string|max:500',
        'KD_PROPINSI' => 'nullable|string|max:2',
        'KD_DATI2' => 'nullable|string|max:2',
        'KD_JNS_PELAYANAN' => 'nullable|string|max:2',
        'KD_KECAMATAN' => 'nullable|string|max:3',
        'KD_KELURAHAN' => 'nullable|string|max:3',
        'KD_BLOK' => 'nullable|string|max:3',
        'NO_URUT' => 'nullable|string|max:4',
        'KD_JNS_OP' => 'nullable|string|max:1',
        'KECAMATAN' => 'nullable|string|max:200',
        'KELURAHAN' => 'nullable|string|max:200',
        'KETERANGAN_BERKAS' => 'nullable|string|max:255',
    ];

	protected $casts = [
		'ID' => 'int',
		'TANGGAL_PELAYANAN' => 'datetime',
		'TANGGAL_PERKIRAAN_SELESAI' => 'datetime',
		'STATUS_PELAYANAN' => 'int',
		'TGL_MASUK_PENILAI' => 'datetime',
		'TGL_SELESAI' => 'datetime',
		'TGL_TERKONFIRMASI_WP' => 'datetime',
		'TGL_PENETAPAN' => 'datetime',
		'TGL_BERKAS_DITUNDA' => 'datetime'
	];

	protected $fillable = [
		'ID',
		'NAMA_PEMOHON',
		'ALAMAT_PEMOHON',
		'LETAK_OP',
		'KECAMATAN',
		'KELURAHAN',
		'NO_PELAYANAN',
		'TANGGAL_PELAYANAN',
		'KD_PROPINSI',
		'KD_DATI2',
		'KD_KECAMATAN',
		'KD_KELURAHAN',
		'KD_BLOK',
		'NO_URUT',
		'KD_JNS_OP',
		'KD_JNS_PELAYANAN',
		'TANGGAL_PERKIRAAN_SELESAI',
		'STATUS_PELAYANAN',
		'NIP_PETUGAS_PENERIMA',
		'NAMA_PETUGAS_PENERIMA',
		'NIP_AR',
		'NAMA_AR',
		'CATATAN',
		'KETERANGAN',
		'TGL_MASUK_PENILAI',
		'NIP_MASUK_PENILAI',
		'TGL_SELESAI',
		'NIP_SELESAI',
		'TGL_TERKONFIRMASI_WP',
		'NIP_TERKONFIRMASI_WP',
		'TGL_PENETAPAN',
		'NIP_PENETAPAN',
		'TGL_BERKAS_DITUNDA',
		'NIP_BERKAS_DITUNDA',
		'TTD_JABATAN_KIRI',
		'TTD_NAMA_KIRI',
		'TTD_NIP_KIRI',
		'TTD_JABATAN_KANAN',
		'TTD_NAMA_KANAN',
		'TTD_NIP_KANAN',
		'KETERANGAN_BERKAS'
	];


	public function getLaporan($tgl_awal, $tgl_akhir, $jenis_pelayanan, $status_pelayanan){
        $q = '';
        if(!empty($status_pelayanan)){
            $q .=  " AND STATUS_PELAYANAN = $status_pelayanan";
        }
        if(!empty($jenis_pelayanan)){
            $q .=  " AND pelayanan.KD_JNS_PELAYANAN = '$jenis_pelayanan' ";
        }
        
	
		$data = DB::table('pelayanan')
			->select(
				'NO_PELAYANAN',
				'NAMA_PEMOHON',
				'TANGGAL_PELAYANAN',
				DB::raw("CONCAT(
					KD_PROPINSI,
					KD_DATI2,
					KD_KECAMATAN,
					KD_KELURAHAN,
					KD_BLOK,
					NO_URUT,
					KD_JNS_OP
				) AS NOP"),
				'ref_jns_pelayanan.NM_JENIS_PELAYANAN AS JENIS_PELAYANAN',
				'status_pelayanan.nama AS STATUS_PELAYANAN',
				'KETERANGAN_BERKAS'
			)
			->leftJoin('status_pelayanan', 'pelayanan.STATUS_PELAYANAN', '=', 'status_pelayanan.id')
			->leftJoin('ref_jns_pelayanan', 'ref_jns_pelayanan.KD_JNS_PELAYANAN', '=', 'pelayanan.KD_JNS_PELAYANAN')
			// ->whereBetween('TANGGAL_PELAYANAN', [$tgl_awal, $tgl_akhir])
			->whereRaw("TANGGAL_PELAYANAN BETWEEN '$tgl_awal' AND '$tgl_akhir' $q")
			->get();
	
		return $data;
		
        

    }
}
