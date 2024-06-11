<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RealisasiKelurahanExport implements FromCollection, WithHeadings
{

    private $TGL_REALISASI;
    private $THN_PAJAK_SPPT;
    private $PBB_MIN;
    private $PBB_MAX;

    public function __construct($TGL_REALISASI, $THN_PAJAK_SPPT, $PBB_MIN, $PBB_MAX)
    {
        $this->TGL_REALISASI = $TGL_REALISASI;
        $this->THN_PAJAK_SPPT = $THN_PAJAK_SPPT;
        $this->PBB_MIN = $PBB_MIN;
        $this->PBB_MAX = $PBB_MAX;

    }


    public function headings(): array
    {
        return [
            'Kecamatan',
            'Kelurahan',
            'Pokok',
            'Pokok Dibayar',
            'Denda Dibayar',
            'Total Dibayar',
            'Kurang Bayar',
            'Lebih Bayar',
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $val = DB::table('sppt')
            ->select(
                'ref_kecamatan.NM_KECAMATAN',
                'ref_kelurahan.NM_KELURAHAN',
                DB::raw('SUM(PBB_YG_HARUS_DIBAYAR_SPPT) AS POKOK_TERHUTANG'),
                DB::raw('SUM(IFNULL(DENDA_SPPT, 0)) AS DENDA_BAYAR'),
                DB::raw('SUM(IFNULL(JML_SPPT_YG_DIBAYAR, 0)) AS JUMLAH_BAYAR'),
                DB::raw('SUM(IFNULL(JML_SPPT_YG_DIBAYAR, 0) - IFNULL(DENDA_SPPT, 0)) AS POKOK_BAYAR'),
                DB::raw('CASE WHEN SUM(PBB_YG_HARUS_DIBAYAR_SPPT - IFNULL(JML_SPPT_YG_DIBAYAR, 0) + IFNULL(DENDA_SPPT, 0)) < 0 THEN 0 ELSE SUM(PBB_YG_HARUS_DIBAYAR_SPPT - IFNULL(JML_SPPT_YG_DIBAYAR, 0) + IFNULL(DENDA_SPPT, 0)) END AS KURANG_BAYAR'),
                DB::raw('CASE WHEN SUM(IFNULL(JML_SPPT_YG_DIBAYAR, 0) - IFNULL(DENDA_SPPT, 0) - PBB_YG_HARUS_DIBAYAR_SPPT) < 0 THEN 0 ELSE SUM(IFNULL(JML_SPPT_YG_DIBAYAR, 0) - IFNULL(DENDA_SPPT, 0) - PBB_YG_HARUS_DIBAYAR_SPPT) END AS LEBIH_BAYAR')

            )
            ->leftJoin('pembayaran_sppt', function ($join) {
                $join->on('sppt.KD_PROPINSI', '=', 'pembayaran_sppt.KD_PROPINSI')
                    ->on('sppt.KD_DATI2', '=', 'pembayaran_sppt.KD_DATI2')
                    ->on('sppt.KD_KECAMATAN', '=', 'pembayaran_sppt.KD_KECAMATAN')
                    ->on('sppt.KD_KELURAHAN', '=', 'pembayaran_sppt.KD_KELURAHAN')
                    ->on('sppt.KD_BLOK', '=', 'pembayaran_sppt.KD_BLOK')
                    ->on('sppt.NO_URUT', '=', 'pembayaran_sppt.NO_URUT')
                    ->on('sppt.KD_JNS_OP', '=', 'pembayaran_sppt.KD_JNS_OP')
                    ->on('sppt.THN_PAJAK_SPPT', '=', 'pembayaran_sppt.THN_PAJAK_SPPT')
                    ->where('TGL_PEMBAYARAN_SPPT', '<=', $this->TGL_REALISASI);
            })
            ->leftJoin('ref_kecamatan', function ($join) {
                $join->on('sppt.KD_PROPINSI', '=', 'ref_kecamatan.KD_PROPINSI')
                    ->on('sppt.KD_DATI2', '=', 'ref_kecamatan.KD_DATI2')
                    ->on('sppt.KD_KECAMATAN', '=', 'ref_kecamatan.KD_KECAMATAN');
            })
            ->leftJoin('ref_kelurahan', function ($join) {
                $join->on('sppt.KD_PROPINSI', '=', 'ref_kelurahan.KD_PROPINSI')
                    ->on('sppt.KD_DATI2', '=', 'ref_kelurahan.KD_DATI2')
                    ->on('sppt.KD_KECAMATAN', '=', 'ref_kelurahan.KD_KECAMATAN')
                    ->on('sppt.KD_KELURAHAN', '=', 'ref_kelurahan.KD_KELURAHAN');
            })
            ->where('sppt.THN_PAJAK_SPPT', $this->THN_PAJAK_SPPT)
            ->whereBetween('PBB_YG_HARUS_DIBAYAR_SPPT', [$this->PBB_MIN, $this->PBB_MAX])
            ->groupBy('ref_kecamatan.NM_KECAMATAN', 'ref_kelurahan.NM_KELURAHAN')
            ->get();

            return $val;
    }
}
