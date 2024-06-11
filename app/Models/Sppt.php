<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Thiagoprz\CompositeKey\HasCompositeKey;

/**
 * Class Sppt
 * 
 * @property string $KD_PROPINSI
 * @property string $KD_DATI2
 * @property string $KD_KECAMATAN
 * @property string $KD_KELURAHAN
 * @property string $KD_BLOK
 * @property string $NO_URUT
 * @property string $KD_JNS_OP
 * @property string $THN_PAJAK_SPPT
 * @property int|null $SIKLUS_SPPT
 * @property string|null $KD_KANWIL_BANK
 * @property string|null $KD_KPPBB_BANK
 * @property string|null $KD_BANK_TUNGGAL
 * @property string|null $KD_BANK_PERSEPSI
 * @property string|null $KD_TP
 * @property string|null $NM_WP_SPPT
 * @property string|null $JLN_WP_SPPT
 * @property string|null $BLOK_KAV_NO_WP_SPPT
 * @property string|null $RW_WP_SPPT
 * @property string|null $RT_WP_SPPT
 * @property string|null $KELURAHAN_WP_SPPT
 * @property string|null $KOTA_WP_SPPT
 * @property string|null $KD_POS_WP_SPPT
 * @property string|null $NPWP_SPPT
 * @property string|null $NO_PERSIL_SPPT
 * @property string|null $KD_KLS_TANAH
 * @property Carbon|null $THN_AWAL_KLS_TANAH
 * @property string|null $KD_KLS_BNG
 * @property Carbon|null $THN_AWAL_KLS_BNG
 * @property Carbon|null $TGL_JATUH_TEMPO_SPPT
 * @property int $LUAS_BUMI_SPPT
 * @property int $LUAS_BNG_SPPT
 * @property int $NJOP_BUMI_SPPT
 * @property int $NJOP_BNG_SPPT
 * @property int $NJOP_SPPT
 * @property int $NJOPTKP_SPPT
 * @property int $NJKP_SPPT
 * @property int $PBB_TERHUTANG_SPPT
 * @property int $FAKTOR_PENGURANG_SPPT
 * @property int $PBB_YG_HARUS_DIBAYAR_SPPT
 * @property bool|null $STATUS_PEMBAYARAN_SPPT
 * @property bool|null $STATUS_TAGIHAN_SPPT
 * @property bool|null $STATUS_CETAK_SPPT
 * @property Carbon|null $TGL_TERBIT_SPPT
 * @property Carbon|null $TGL_CETAK_SPPT
 * @property string|null $NIP_PENCETAK_SPPT
 *
 * @package App\Models
 */
class Sppt extends Model
{

  use HasCompositeKey;
  protected $table = 'sppt';
  public $incrementing = false;
  public $timestamps = false;

  protected $primaryKey = ['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP', 'THN_PAJAK_SPPT'];


  protected $casts = [
    'SIKLUS_SPPT' => 'int',
    'THN_AWAL_KLS_TANAH' => 'datetime',
    'THN_AWAL_KLS_BNG' => 'datetime',
    'TGL_JATUH_TEMPO_SPPT' => 'datetime',
    'LUAS_BUMI_SPPT' => 'int',
    'LUAS_BNG_SPPT' => 'int',
    'NJOP_BUMI_SPPT' => 'int',
    'NJOP_BNG_SPPT' => 'int',
    'NJOP_SPPT' => 'int',
    'NJOPTKP_SPPT' => 'int',
    'NJKP_SPPT' => 'int',
    'PBB_TERHUTANG_SPPT' => 'int',
    'FAKTOR_PENGURANG_SPPT' => 'int',
    'PBB_YG_HARUS_DIBAYAR_SPPT' => 'int',
    'STATUS_PEMBAYARAN_SPPT' => 'bool',
    'STATUS_TAGIHAN_SPPT' => 'bool',
    'STATUS_CETAK_SPPT' => 'bool',
    'TGL_TERBIT_SPPT' => 'datetime',
    'TGL_CETAK_SPPT' => 'datetime'
  ];

  protected $fillable = [
    'SIKLUS_SPPT',
    'KD_KANWIL_BANK',
    'KD_KPPBB_BANK',
    'KD_BANK_TUNGGAL',
    'KD_BANK_PERSEPSI',
    'KD_TP',
    'NM_WP_SPPT',
    'JLN_WP_SPPT',
    'BLOK_KAV_NO_WP_SPPT',
    'RW_WP_SPPT',
    'RT_WP_SPPT',
    'KELURAHAN_WP_SPPT',
    'KOTA_WP_SPPT',
    'KD_POS_WP_SPPT',
    'NPWP_SPPT',
    'NO_PERSIL_SPPT',
    'KD_KLS_TANAH',
    'THN_AWAL_KLS_TANAH',
    'KD_KLS_BNG',
    'THN_AWAL_KLS_BNG',
    'TGL_JATUH_TEMPO_SPPT',
    'LUAS_BUMI_SPPT',
    'LUAS_BNG_SPPT',
    'NJOP_BUMI_SPPT',
    'NJOP_BNG_SPPT',
    'NJOP_SPPT',
    'NJOPTKP_SPPT',
    'NJKP_SPPT',
    'PBB_TERHUTANG_SPPT',
    'FAKTOR_PENGURANG_SPPT',
    'PBB_YG_HARUS_DIBAYAR_SPPT',
    'STATUS_PEMBAYARAN_SPPT',
    'STATUS_TAGIHAN_SPPT',
    'STATUS_CETAK_SPPT',
    'TGL_TERBIT_SPPT',
    'TGL_CETAK_SPPT',
    'NIP_PENCETAK_SPPT'
  ];

  public function pembayaran_sppt()
  {
    return $this->hasMany(PembayaranSppt::class, 'KD_PROPINSI', 'KD_PROPINSI')
      ->where('KD_DATI2', '=', 'KD_DATI2')
      ->where('KD_KECAMATAN', '=', 'KD_KECAMATAN')
      ->where('KD_KELURAHAN', '=', 'KD_KELURAHAN')
      ->where('KD_BLOK', '=', 'KD_BLOK')
      ->where('NO_URUT', '=', 'NO_URUT')
      ->where('KD_JNS_OP', '=', 'KD_JNS_OP')
      ->where('THN_PAJAK_SPPT', '=', 'THN_PAJAK_SPPT');
  }

  public function getSkNjop($NOP, $TAHUN)
  {
    $model = DB::select("
            SELECT 
                a.KD_PROPINSI AS KD_PROPINSI,
                a.KD_DATI2 AS KD_DATI2,
                a.KD_KECAMATAN AS KD_KECAMATAN,
                a.KD_KELURAHAN AS KD_KELURAHAN,
                a.KD_BLOK AS KD_BLOK,
                a.NO_URUT AS NO_URUT,
                a.KD_JNS_OP AS KD_JNS_OP,
                CONCAT(IFNULL(a.JALAN_OP,'-'),', ',IFNULL(a.BLOK_KAV_NO_OP,'-')) AS JALAN_OP_BARU,
                dat_subjek_pajak.`NM_WP` AS NAMA_BARU,
                dat_subjek_pajak.`JALAN_WP` AS JALAN_WP_BARU,
                CONCAT(IFNULL(dat_subjek_pajak.JALAN_WP,'-'),', ',IFNULL(dat_subjek_pajak.BLOK_KAV_NO_WP,'-')) AS JALAN_WP_BARU,
                a.`LUAS_BUMI` AS LUAS_BUMI_BARU,
                d.LUAS_BNG AS LUAS_BNG_BARU,
                kelas_bumi.NJOP_BUMI * a.LUAS_BUMI * 1000 AS NJOP_BUMI_TOTAL_BARU,
                d.NJOP_BNG_TOTAL AS NJOP_BNG_TOTAL_BARU,
                b.NM_WP_SPPT AS NAMA_LAMA,
                CONCAT(IFNULL(b.JLN_WP_SPPT,'-'),', ',IFNULL(b.BLOK_KAV_NO_WP_SPPT,'-')) AS JALAN_WP_LAMA,
                LUAS_BUMI_SPPT AS LUAS_BUMI_LAMA,
                LUAS_BNG_SPPT AS LUAS_BNG_LAMA,
                NJOP_BUMI_SPPT AS NJOP_BUMI_TOTAL_LAMA,
                NJOP_BNG_SPPT AS NJOP_BNG_TOTAL_LAMA 
            FROM
                spop a 
                LEFT JOIN sppt b 
                    ON a.`KD_PROPINSI` = b.`KD_PROPINSI` 
                    AND a.`KD_DATI2` = b.`KD_DATI2` 
                    AND a.`KD_KECAMATAN` = b.`KD_KECAMATAN` 
                    AND a.`KD_KELURAHAN` = b.`KD_KELURAHAN` 
                    AND a.`KD_BLOK` = b.`KD_BLOK` 
                    AND a.`NO_URUT` = b.`NO_URUT` 
                    AND a.`KD_JNS_OP` = b.`KD_JNS_OP` 
                    AND $TAHUN = b.THN_PAJAK_SPPT
                JOIN dat_subjek_pajak c 
                    ON c.`SUBJEK_PAJAK_ID` = a.`SUBJEK_PAJAK_ID` 
                LEFT JOIN 
                    (SELECT 
                        KD_PROPINSI,
                        KD_DATI2,
                        KD_KECAMATAN,
                        KD_KELURAHAN,
                        KD_BLOK,
                        NO_URUT,
                        KD_JNS_OP,
                        IF(
                            NILAI_SISTEM_BNG > 0 
                            AND (
                                NJOP_BANGUNAN IS NULL 
                                OR NJOP_BANGUNAN = 0
                            ),
                            NILAI_SISTEM_BNG,
                            NJOP_BANGUNAN * LUAS_BNG
                        ) * 1000 AS NJOP_BNG_TOTAL,
                        LUAS_BNG 
                    FROM
                        (SELECT 
                            KD_PROPINSI,
                            KD_DATI2,
                            KD_KECAMATAN,
                            KD_KELURAHAN,
                            KD_BLOK,
                            NO_URUT,
                            KD_JNS_OP,
                            SUM(
                                IF(
                                    NILAI_INDIVIDU > 0,
                                    NILAI_INDIVIDU,
                                    NILAI_SISTEM_BNG
                                )
                            ) AS NILAI_SISTEM_BNG,
                            SUM(LUAS_BNG) AS LUAS_BNG 
                        FROM
                            lspop 
                        WHERE KD_PROPINSI = SUBSTRING($NOP, 1, 2) 
                            AND KD_DATI2 = SUBSTRING($NOP, 3, 2) 
                            AND KD_KECAMATAN = SUBSTRING($NOP, 5, 3) 
                            AND KD_KELURAHAN = SUBSTRING($NOP, 8, 3) 
                            AND KD_BLOK = SUBSTRING($NOP, 11, 3) 
                            AND NO_URUT = SUBSTRING($NOP, 14, 4) 
                            AND KD_JNS_OP = SUBSTRING($NOP, 18, 1) 
                        GROUP BY KD_PROPINSI,
                            KD_DATI2,
                            KD_KECAMATAN,
                            KD_KELURAHAN,
                            KD_BLOK,
                            NO_URUT,
                            KD_JNS_OP) t1 
                    LEFT OUTER JOIN kelas_bangunan 
                        ON (
                            (
                                t1.NILAI_SISTEM_BNG / t1.LUAS_BNG
                            ) BETWEEN kelas_bangunan.NILAI_MINIMUM + 0.01 
                            AND kelas_bangunan.NILAI_MAKSIMUM
                        )) d 
                    ON a.`KD_PROPINSI` = d.`KD_PROPINSI` 
                    AND a.`KD_DATI2` = d.`KD_DATI2` 
                    AND a.`KD_KECAMATAN` = d.`KD_KECAMATAN` 
                    AND a.`KD_KELURAHAN` = d.`KD_KELURAHAN` 
                    AND a.`KD_BLOK` = d.`KD_BLOK` 
                    AND a.`NO_URUT` = d.`NO_URUT` 
                    AND a.`KD_JNS_OP` = d.`KD_JNS_OP` 
                LEFT JOIN dat_subjek_pajak 
                    ON a.SUBJEK_PAJAK_ID = dat_subjek_pajak.SUBJEK_PAJAK_ID 
                LEFT JOIN kelas_bumi 
                    ON (
                        a.NILAI_SISTEM_BUMI / a.LUAS_BUMI BETWEEN kelas_bumi.NILAI_MINIMUM + 0.01 
                        AND kelas_bumi.NILAI_MAKSIMUM
                    ) 
            WHERE a.KD_PROPINSI = SUBSTRING($NOP, 1, 2) 
                AND a.KD_DATI2 = SUBSTRING($NOP, 3, 2) 
                AND a.KD_KECAMATAN = SUBSTRING($NOP, 5, 3) 
                AND a.KD_KELURAHAN = SUBSTRING($NOP, 8, 3) 
                AND a.KD_BLOK = SUBSTRING($NOP, 11, 3) 
                AND a.NO_URUT = SUBSTRING($NOP, 14, 4) 
                AND a.KD_JNS_OP = SUBSTRING($NOP, 18, 1) 
        ");

    return empty($model) ? null : $model[0];
  }

  public function neracaKpp($thn_awal, $thn_akhir, $per_tanggal)
  {
    $persen_penyisihan = 0;

    if ($thn_akhir - $thn_awal == 0) {
      //Lancar 0.5%
      $persen_penyisihan = 0.005;
    } elseif ($thn_akhir - $thn_awal == 1 || $thn_akhir - $thn_awal == 2) {
      //kurang lancar 10%
      $persen_penyisihan = 0.1;
    } elseif ($thn_akhir - $thn_awal > 2 && $thn_akhir - $thn_awal <= 5) {
      //diragukan 50%
      $persen_penyisihan = 0.5;
    } elseif ($thn_akhir - $thn_awal > 5) {
      //macet 100%
      $persen_penyisihan = 1;
    }

    $sql1 = "DROP TABLE IF EXISTS temp_neraca_kpp";
    $sql2 = "CREATE TABLE temp_neraca_kpp AS
                SELECT 
                  CONCAT(a.KD_PROPINSI,
                  a.KD_DATI2,
                  a.KD_KECAMATAN,
                  a.KD_KELURAHAN,
                  a.KD_BLOK,
                  a.NO_URUT,
                  a.KD_JNS_OP) AS NOP,
                  NM_WP_SPPT AS NAMA,
                  PBB_YG_HARUS_DIBAYAR_SPPT - SUM(
                    IFNULL(b.JML_SPPT_YG_DIBAYAR, 0) - IFNULL(b.DENDA_SPPT, 0)
                  ) AS KETETAPAN,
                  SUM(
                    IFNULL(c.JML_SPPT_YG_DIBAYAR, 0) - IFNULL(c.DENDA_SPPT, 0)
                  ) AS POKOK_BAYAR,
                  SUM(IFNULL(c.DENDA_SPPT, 0)) AS DENDA_BAYAR,
                  GROUP_CONCAT(c.TGL_PEMBAYARAN_SPPT) AS TGL_BAYAR,
                  PBB_YG_HARUS_DIBAYAR_SPPT - SUM(
                    IFNULL(b.JML_SPPT_YG_DIBAYAR, 0) - IFNULL(b.DENDA_SPPT, 0)
                  ) - SUM(
                    IFNULL(c.JML_SPPT_YG_DIBAYAR, 0) - IFNULL(c.DENDA_SPPT, 0)
                  ) AS SISA_PIUTANG,
                  PBB_YG_HARUS_DIBAYAR_SPPT - SUM(
                    IFNULL(b.JML_SPPT_YG_DIBAYAR, 0) - IFNULL(b.DENDA_SPPT, 0)
                  ) - SUM(
                    IFNULL(c.JML_SPPT_YG_DIBAYAR, 0) - IFNULL(c.DENDA_SPPT, 0)
                  ) * $persen_penyisihan AS PENYISIHAN,
                  PBB_YG_HARUS_DIBAYAR_SPPT - SUM(
                    IFNULL(b.JML_SPPT_YG_DIBAYAR, 0) - IFNULL(b.DENDA_SPPT, 0)
                  ) - SUM(
                    IFNULL(c.JML_SPPT_YG_DIBAYAR, 0) - IFNULL(c.DENDA_SPPT, 0)
                  ) - (
                    PBB_YG_HARUS_DIBAYAR_SPPT - SUM(
                      IFNULL(b.JML_SPPT_YG_DIBAYAR, 0) - IFNULL(b.DENDA_SPPT, 0)
                    ) - SUM(
                      IFNULL(c.JML_SPPT_YG_DIBAYAR, 0) - IFNULL(c.DENDA_SPPT, 0)
                    ) * $persen_penyisihan
                  ) AS NETTO 
                FROM
                  sppt a 
                  LEFT JOIN pembayaran_sppt b 
                    ON a.KD_PROPINSI = b.KD_PROPINSI 
                    AND a.KD_DATI2 = b.KD_DATI2 
                    AND a.KD_KECAMATAN = b.KD_KECAMATAN 
                    AND a.KD_KELURAHAN = b.KD_KELURAHAN 
                    AND a.KD_BLOK = b.KD_BLOK 
                    AND a.NO_URUT = b.NO_URUT 
                    AND a.KD_JNS_OP = b.KD_JNS_OP 
                    AND a.THN_PAJAK_SPPT = b.THN_PAJAK_SPPT 
                    AND YEAR(b.TGL_PEMBAYARAN_SPPT) < 2013 
                  LEFT JOIN pembayaran_sppt c 
                    ON a.KD_PROPINSI = c.KD_PROPINSI 
                    AND a.KD_DATI2 = c.KD_DATI2 
                    AND a.KD_KECAMATAN = c.KD_KECAMATAN 
                    AND a.KD_KELURAHAN = c.KD_KELURAHAN 
                    AND a.KD_BLOK = c.KD_BLOK 
                    AND a.NO_URUT = c.NO_URUT 
                    AND a.KD_JNS_OP = c.KD_JNS_OP 
                    AND a.THN_PAJAK_SPPT = c.THN_PAJAK_SPPT 
                    AND YEAR(c.TGL_PEMBAYARAN_SPPT) BETWEEN 2013 
                    AND $thn_akhir 
                WHERE a.THN_PAJAK_SPPT = $thn_awal 
                GROUP BY a.KD_PROPINSI,
                  a.KD_DATI2,
                  a.KD_KECAMATAN,
                  a.KD_KELURAHAN,
                  a.KD_BLOK,
                  a.NO_URUT,
                  a.KD_JNS_OP,
                  a.THN_PAJAK_SPPT 
                HAVING SISA_PIUTANG > 0 ";

    DB::statement($sql1);
    DB::statement($sql2);
  }

  public function neracaKppSummary($thn_awal, $thn_akhir, $per_tanggal, $tahun_neraca)
  {
    $sql1 = "SELECT * FROM sisa_piutang WHERE thn_neraca=" . ($tahun_neraca);
    $sql2 = "SELECT 
                    THN_PAJAK_SPPT,
                    SUM(IFNULL(JML_SPPT_YG_DIBAYAR, 0)) AS TOTAL,
                    SUM(IFNULL(DENDA_SPPT, 0)) AS DENDA 
                  FROM
                    pembayaran_sppt 
                  WHERE (
                      TGL_PEMBAYARAN_SPPT BETWEEN CONCAT(
                        SUBSTR('$per_tanggal', 1, 4),
                        '-01-01'
                      ) 
                      AND '$per_tanggal'
                    ) 
                    AND (
                      THN_PAJAK_SPPT BETWEEN $thn_awal 
                      AND $thn_akhir
                    )
                  GROUP BY THN_PAJAK_SPPT";

    $sisa = DB::select($sql1);
    
    $pembayaran = DB::select($sql2);
    // dd($pembayaran);
    $data = [];

    foreach ($sisa as $key => $value) {
      $data[$value->THN_PIUTANG]['SISA'] = $value->TOTAL;
      $data[$value->THN_PIUTANG]['TOTAL'] = 0;
      $data[$value->THN_PIUTANG]['DENDA'] = 0;
      $data[$value->THN_PIUTANG]['POKOK'] = 0;
    }

    foreach ($pembayaran as $key => $value) {
      $data[$value->THN_PAJAK_SPPT]['TOTAL'] = $value->TOTAL;
      $data[$value->THN_PAJAK_SPPT]['DENDA'] = $value->DENDA;
      $data[$value->THN_PAJAK_SPPT]['POKOK'] = $value->TOTAL - $value->DENDA;
    }

    foreach ($data as $thn => $value) {
      // Use consistent keys for the calculations
      $sisa = isset($value['SISA']) ? $value['SISA'] : 0;
      $pokok = isset($value['POKOK']) ? $value['POKOK'] : 0;

      $data[$thn]['PENYISIHAN'] = $tahun_neraca - $thn <= 5 ? ($sisa - $pokok) * 0.5 : ($sisa - $pokok) * 1;    }

      
    return $data;
  }

  public function neracaBpk()
  {
    //
  }

  public function neracaBpkSummary($thn_awal, $thn_akhir, $per_tanggal)
  {
    set_time_limit(300); // Set to 2 minutes

    $sql1 = "SELECT 
                  THN_PAJAK_SPPT,
                  SUM(PBB_YG_HARUS_DIBAYAR_SPPT) AS KETETAPAN
                FROM
                  sppt 
                WHERE THN_PAJAK_SPPT BETWEEN $thn_awal 
                  AND $thn_akhir
                GROUP BY THN_PAJAK_SPPT 
                ORDER BY THN_PAJAK_SPPT DESC";
	  $sql2 = "SELECT 
				  THN_PAJAK_SPPT,
				  SUM(
					IF(
					  POKOK - POKOK_BAYAR <= 0,
					  POKOK,
					  POKOK_BAYAR
					)
				  ) AS POKOK,
				  SUM(DENDA_BAYAR) AS DENDA 
				FROM  
				  (SELECT 
					THN_PAJAK_SPPT,
					PBB_YG_HARUS_DIBAYAR_SPPT AS POKOK,
					SUM(JML_SPPT_YG_DIBAYAR - DENDA_SPPT) AS POKOK_BAYAR,
					SUM(DENDA_SPPT) AS DENDA_BAYAR 
				  FROM
					sppt 
					JOIN pembayaran_sppt USING (
						KD_PROPINSI,
						KD_DATI2,
						KD_KECAMATAN,
						KD_KELURAHAN,
						KD_BLOK,
						NO_URUT,
						KD_JNS_OP,
						THN_PAJAK_SPPT
					  ) 
				  WHERE THN_PAJAK_SPPT BETWEEN $thn_awal AND $thn_akhir-1
					AND YEAR(TGL_PEMBAYARAN_SPPT) < $thn_akhir 
				  GROUP BY KD_PROPINSI,
					KD_DATI2,
					KD_KECAMATAN,
					KD_KELURAHAN,
					KD_BLOK,
					NO_URUT,
					KD_JNS_OP,
					THN_PAJAK_SPPT) AS a 
				GROUP BY THN_PAJAK_SPPT ";      

      $sql3 = "SELECT 
                  THN_PAJAK_SPPT,
                  SUM(IF(JML_SPPT_YG_DIBAYAR-DENDA_SPPT<0,0,JML_SPPT_YG_DIBAYAR-DENDA_SPPT)) AS POKOK,
                  SUM(DENDA_SPPT) AS DENDA 
                FROM
                  pembayaran_sppt 
                WHERE THN_PAJAK_SPPT BETWEEN $thn_awal 
                  AND $thn_akhir
                  AND TGL_PEMBAYARAN_SPPT <= '$per_tanggal'
                  AND YEAR(TGL_PEMBAYARAN_SPPT)>=$thn_akhir 
                GROUP BY THN_PAJAK_SPPT
                ORDER BY THN_PAJAK_SPPT DESC ";
      $ketetapan = DB::select($sql1);
      $ketetapan = json_decode(json_encode($ketetapan), true);
      $byr_before = DB::select($sql2);
      $byr_before = json_decode(json_encode($byr_before), true);
      $byr_now = DB::select($sql3);
      $byr_now = json_decode(json_encode($byr_now), true);
      
      $data = [];
      foreach ($ketetapan as $key => $value) {
        $data[$value['THN_PAJAK_SPPT']]['KETETAPAN'] = $value['KETETAPAN'];
      }

      foreach ($byr_before as $key => $value) {
        $data[$value['THN_PAJAK_SPPT']]['POKOK_SEBELUM'] = $value['POKOK'];
        $data[$value['THN_PAJAK_SPPT']]['DENDA_SEBELUM'] = $value['DENDA'];
      }

      foreach ($byr_now as $key => $value) {
        $data[$value['THN_PAJAK_SPPT']]['POKOK_NOW'] = $value['POKOK'];
        $data[$value['THN_PAJAK_SPPT']]['DENDA_NOW'] = $value['DENDA'];
      }
      foreach ($data as $thn => $value) {
        $persen_penyisihan = 0;
        if($thn_akhir-$thn==0){
          //Lancar 0.5%
          $persen_penyisihan = 0.005;
          $data[$thn]['SISA_AWAL'] = $value['KETETAPAN'];
          $data[$thn]['SISA'] = $value['KETETAPAN'] - $value['POKOK_NOW'];
        } elseif($thn_akhir-$thn==1 || $thn_akhir-$thn==2){
          //kurang lancar 10%
          $persen_penyisihan = 0.1;
          $data[$thn]['SISA_AWAL'] = $value['KETETAPAN'] - $value['POKOK_SEBELUM'];
          $data[$thn]['SISA'] = $value['KETETAPAN'] - $value['POKOK_SEBELUM'] - $value['POKOK_NOW'];
        } elseif ($thn_akhir-$thn>2 && $thn_akhir-$thn<=5) {
          //diragukan 50%
          $persen_penyisihan = 0.5;
          $data[$thn]['SISA_AWAL'] = $value['KETETAPAN'] - $value['POKOK_SEBELUM'];
          $data[$thn]['SISA'] = $value['KETETAPAN'] - $value['POKOK_SEBELUM'] - $value['POKOK_NOW'];
        } elseif ($thn_akhir-$thn>5) {
          //macet 100%
          $persen_penyisihan = 1;
          $data[$thn]['SISA_AWAL'] = $value['KETETAPAN'] - $value['POKOK_SEBELUM'];
          $data[$thn]['SISA'] = $value['KETETAPAN'] - $value['POKOK_SEBELUM'] - $value['POKOK_NOW'];
        }
        $data[$thn]['PENYISIHAN_PIUTANG'] = $data[$thn]['SISA'] * $persen_penyisihan;
        $data[$thn]['NETTO'] = $data[$thn]['SISA'] - $data[$thn]['PENYISIHAN_PIUTANG'];

      }

      
      return $data;
  }


  public function prepareDataBaru($start_date, $end_date)
  {
    // Use Laravel's DB facade to execute SQL queries
    DB::statement("DROP TABLE IF EXISTS temp_histori_mutasi");
    DB::statement("ALTER TABLE pelayanan
    MODIFY COLUMN KD_JNS_PELAYANAN VARCHAR(255) COLLATE utf8mb4_general_ci;");
    DB::statement("
            CREATE TABLE temp_histori_mutasi AS 
            SELECT 
                SUBSTRING(nop_sesudah, 1, 2) AS KD_PROPINSI,
                SUBSTRING(nop_sesudah, 3, 2) AS KD_DATI2,
                SUBSTRING(nop_sesudah, 5, 3) AS KD_KECAMATAN,
                SUBSTRING(nop_sesudah, 8, 3) AS KD_KELURAHAN,
                SUBSTRING(nop_sesudah, 11, 3) AS KD_BLOK,
                SUBSTRING(nop_sesudah, 14, 4) AS NO_URUT,
                SUBSTRING(nop_sesudah, 18, 1) AS KD_JNS_OP,
                pelayanan.TANGGAL_PELAYANAN,
                no_pelayanan,
                nop_sebelum,
                nama_sebelum,
                lt_sebelum,
                lb_sebelum,
                pbb_sebelum,
                nop_sesudah,
                nama_sesudah,
                lt_sesudah,
                lb_sesudah,
                pbb_sesudah,
                pelayanan.KETERANGAN,
                pelayanan.CATATAN
            FROM
                histori_mutasi 
                JOIN pelayanan USING (no_pelayanan) 
            WHERE KD_JNS_PELAYANAN = '01' COLLATE utf8mb4_general_ci 
                AND pelayanan.TANGGAL_PELAYANAN  BETWEEN '$start_date' AND '$end_date' COLLATE utf8mb4_general_ci
        ");

    DB::statement("
            ALTER TABLE temp_histori_mutasi 
            ADD FULLTEXT INDEX (
                KD_PROPINSI,
                KD_DATI2,
                KD_KECAMATAN,
                KD_KELURAHAN,
                KD_BLOK,
                NO_URUT,
                KD_JNS_OP
            ),
            ENGINE = MYISAM 
        ");
  }

  public function laporanPelayanan($thn_awal, $jns_pelayanan, $start_date, $end_date)
  {
    $data_baru = false;

    if (($key = array_search('01', $jns_pelayanan)) !== false) {
      $data_baru = true;
      unset($jns_pelayanan[$key]);
    }

    $jns_pelayanan = implode(',', $jns_pelayanan);

    // Use Laravel's DB facade to execute SQL queries
    DB::statement("DELETE FROM temp_pelayanan");

    if (!empty($jns_pelayanan)) {
      DB::statement("
              INSERT IGNORE INTO temp_pelayanan (NOP, KD, KETERANGAN, CATATAN, NO_PELAYANAN, TGL)
              SELECT 
                  CONCAT(KD_PROPINSI, KD_DATI2, KD_KECAMATAN, KD_KELURAHAN, KD_BLOK, NO_URUT, KD_JNS_OP) AS NOP,
                  KD_JNS_PELAYANAN AS KD,
                  pelayanan.KETERANGAN,
                  pelayanan.CATATAN,
                  pelayanan.NO_PELAYANAN,
                  pelayanan.TANGGAL_PELAYANAN
              FROM pelayanan 
              WHERE TANGGAL_PELAYANAN BETWEEN '$start_date' AND '$end_date' 
                  AND KD_PROPINSI <> '00' 
                  AND KD_JNS_PELAYANAN IN ('$jns_pelayanan')
          ");
    }

    DB::statement("DROP TABLE IF EXISTS temp_laporan_pelayanan");
    DB::statement("
          CREATE TABLE temp_laporan_pelayanan AS
          SELECT 
              temp_pelayanan.NO_PELAYANAN,
              temp_pelayanan.KD,
              temp_pelayanan.KETERANGAN,
              temp_pelayanan.CATATAN,
              temp_pelayanan.TGL,
              dhkp.NM_WP_SPPT AS NAMA_SEBELUM,
              CONCAT(
                  dhkp.KD_PROPINSI, '.', dhkp.KD_DATI2, '.', dhkp.KD_KECAMATAN, '.',
                  dhkp.KD_KELURAHAN, '.', dhkp.KD_BLOK, '-', dhkp.NO_URUT, '.', dhkp.KD_JNS_OP
              ) AS NOP_SEBELUM,
              dhkp.LUAS_BUMI_SPPT AS LT_SEBELUM,
              dhkp.LUAS_BNG_SPPT AS LB_SEBELUM,
              dhkp.PBB_TERHUTANG AS KETETAPAN_LAMA,
              sppt.NM_WP_SPPT AS NAMA_BARU,
              CONCAT(
                  sppt.KD_PROPINSI, '.', sppt.KD_DATI2, '.', sppt.KD_KECAMATAN, '.',
                  sppt.KD_KELURAHAN, '.', sppt.KD_BLOK, '-', sppt.NO_URUT, '.', sppt.KD_JNS_OP
              ) AS NOP_BARU,
              sppt.LUAS_BUMI_SPPT AS LT_BARU,
              sppt.LUAS_BNG_SPPT AS LB_BARU,
              sppt.PBB_YG_HARUS_DIBAYAR_SPPT AS KETETAPAN_BARU,
              sppt.PBB_YG_HARUS_DIBAYAR_SPPT - dhkp.PBB_TERHUTANG AS SELISIH_KETETAPAN 
          FROM
              temp_pelayanan 
              LEFT JOIN dhkp ON CONCAT(
                  dhkp.KD_PROPINSI, dhkp.KD_DATI2, dhkp.KD_KECAMATAN, dhkp.KD_KELURAHAN,
                  dhkp.KD_BLOK, dhkp.NO_URUT, dhkp.KD_JNS_OP
              ) = temp_pelayanan.NOP 
              LEFT JOIN sppt USING (
                  KD_PROPINSI, KD_DATI2, KD_KECAMATAN, KD_KELURAHAN, KD_BLOK, NO_URUT,
                  KD_JNS_OP, THN_PAJAK_SPPT
              ) 
          WHERE dhkp.THN_PAJAK_SPPT = $thn_awal
      ");

    if ($data_baru) {
      $this->prepareDataBaru($start_date, $end_date);

      DB::statement("
              INSERT INTO temp_laporan_pelayanan (
                  NO_PELAYANAN, KD, TGL, KETERANGAN, CATATAN, NAMA_SEBELUM, NOP_SEBELUM,
                  LT_SEBELUM, LB_SEBELUM, KETETAPAN_LAMA, NAMA_BARU, NOP_BARU, LT_BARU,
                  LB_BARU, KETETAPAN_BARU, SELISIH_KETETAPAN
              ) 
              SELECT 
                  temp_histori_mutasi.no_pelayanan,
                  '01',
                  TANGGAL_PELAYANAN,
                  KETERANGAN,
                  CATATAN,
                  nama_sebelum,
                  nop_sebelum,
                  lt_sebelum,
                  lb_sebelum,
                  pbb_sebelum,
                  nama_sesudah,
                  nop_sesudah,
                  lt_sesudah,
                  lb_sesudah,
                  pbb_sesudah,
                  pbb_sesudah - pbb_sebelum 
              FROM
                  temp_histori_mutasi 
                  LEFT JOIN sppt ON sppt.KD_PROPINSI = temp_histori_mutasi.KD_PROPINSI 
                      AND sppt.KD_DATI2 = temp_histori_mutasi.KD_DATI2 
                      AND sppt.KD_KECAMATAN = temp_histori_mutasi.KD_KECAMATAN 
                      AND sppt.KD_KELURAHAN = temp_histori_mutasi.KD_KELURAHAN 
                      AND sppt.KD_BLOK = temp_histori_mutasi.KD_BLOK 
                      AND sppt.NO_URUT = temp_histori_mutasi.NO_URUT 
                      AND sppt.KD_JNS_OP = temp_histori_mutasi.KD_JNS_OP 
                      AND sppt.THN_PAJAK_SPPT = $thn_awal
          ");
    }
  }

  public function getDataByNOPTahun($NOP, $tahun_awal, $tahun_akhir)
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
      ->whereBetween('THN_PAJAK_SPPT', [$tahun_awal, $tahun_akhir])
      ->orderBy('THN_PAJAK_SPPT')
      ->get()
      ->toArray();
  }
  public function hitungDenda($tanggal_tempo, $pbb, $diff = 'bulan')
  {
    if ($diff == 'hari') {
      $tgl = $tanggal_tempo['year'] . '-' . $tanggal_tempo['month'] . '-' . $tanggal_tempo['day'];

      $tanggal_awal = date_create($tgl);
      $tanggal_akhir = date_create(date('Y-m-d'));

      $interval = date_diff($tanggal_akhir, $tanggal_awal);
      $tahun = $interval->format('%y');
      $bulan = $tahun * 12 + $interval->format('%m');
    } elseif ($diff == 'bulan') {
      if ($tanggal_tempo['year'] == date('Y')) {
        $bulan = date('m') - $tanggal_tempo['month'];
        if ($bulan < 0) $bulan = 0;
      } elseif ($tanggal_tempo['year'] < date('Y')) {
        $bulan = (date('Y') - $tanggal_tempo['year']) * 12 + (date('m') - $tanggal_tempo['month']);
      } else {
        $bulan = 0;
      }
    }

    if ($bulan > 24) $bulan = 24;
    $denda = (0.02 * $bulan) * $pbb;
    return $denda;
  }

  


}
