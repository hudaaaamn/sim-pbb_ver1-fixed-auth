<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE VIEW `lspop` AS select `pbb`.`dat_op_bangunan`.`KD_PROPINSI` AS `KD_PROPINSI`,`pbb`.`dat_op_bangunan`.`KD_DATI2` AS `KD_DATI2`,`pbb`.`dat_op_bangunan`.`KD_KECAMATAN` AS `KD_KECAMATAN`,`pbb`.`dat_op_bangunan`.`KD_KELURAHAN` AS `KD_KELURAHAN`,`pbb`.`dat_op_bangunan`.`KD_BLOK` AS `KD_BLOK`,`pbb`.`dat_op_bangunan`.`NO_URUT` AS `NO_URUT`,`pbb`.`dat_op_bangunan`.`KD_JNS_OP` AS `KD_JNS_OP`,`pbb`.`dat_op_bangunan`.`NO_BNG` AS `NO_BNG`,`pbb`.`dat_op_bangunan`.`NO_FORMULIR_LSPOP` AS `NO_FORMULIR_LSPOP`,`pbb`.`dat_op_bangunan`.`JNS_TRANSAKSI_BNG` AS `JNS_TRANSAKSI_BNG`,`pbb`.`dat_op_bangunan`.`KD_JPB` AS `KD_JPB`,`pbb`.`dat_op_bangunan`.`LUAS_BNG` AS `LUAS_BNG`,`pbb`.`dat_op_bangunan`.`JML_LANTAI_BNG` AS `JML_LANTAI_BNG`,`pbb`.`dat_op_bangunan`.`THN_DIBANGUN_BNG` AS `THN_DIBANGUN_BNG`,`pbb`.`dat_op_bangunan`.`THN_RENOVASI_BNG` AS `THN_RENOVASI_BNG`,`pbb`.`dat_op_bangunan`.`KONDISI_BNG` AS `KONDISI_BNG`,`pbb`.`dat_op_bangunan`.`JNS_KONSTRUKSI_BNG` AS `JNS_KONSTRUKSI_BNG`,`pbb`.`dat_op_bangunan`.`JNS_ATAP_BNG` AS `JNS_ATAP_BNG`,`pbb`.`dat_op_bangunan`.`KD_DINDING` AS `KD_DINDING`,`pbb`.`dat_op_bangunan`.`KD_LANTAI` AS `KD_LANTAI`,`pbb`.`dat_op_bangunan`.`KD_LANGIT_LANGIT` AS `KD_LANGIT_LANGIT`,0 AS `TING_KOLOM_JPB3`,0 AS `LBR_BENT_JPB3`,0 AS `DAYA_DUKUNG_LANTAI_JPB3`,0 AS `KELILING_DINDING_JPB3`,0 AS `LUAS_MEZZANINE_JPB3`,0 AS `KLS_JPB2`,0 AS `KLS_JPB4`,0 AS `KLS_JPB5`,0 AS `LUAS_KMR_JPB5_DGN_AC_SENT`,0 AS `LUAS_RNG_LAIN_JPB5_DGN_AC_SENT`,0 AS `KLS_JPB6`,0 AS `JNS_JPB7`,0 AS `BINTANG_JPB7`,0 AS `JML_KMR_JPB7`,0 AS `LUAS_KMR_JPB7_DGN_AC_SENT`,0 AS `LUAS_KMR_LAIN_JPB7_DGN_AC_SENT`,0 AS `TYPE_JPB12`,0 AS `KLS_JPB13`,0 AS `JML_JPB13`,0 AS `LUAS_JPB13_DGN_AC_SENT`,0 AS `LUAS_JPB13_LAIN_DGN_AC_SENT`,0 AS `KAPASITAS_TANGKI_JPB15`,0 AS `LETAK_TANGKI_JPB15`,0 AS `KLS_JPB16`,`pbb`.`dat_op_bangunan`.`NILAI_SISTEM_BNG` AS `NILAI_SISTEM_BNG`,0 AS `NILAI_FORMULA`,`pbb`.`dat_op_bangunan`.`NILAI_INDIVIDU` AS `NILAI_INDIVIDU`,`pbb`.`dat_op_bangunan`.`TGL_KUNJUNGAN_KEMBALI` AS `TGL_KUNJUNGAN_KEMBALI`,`pbb`.`dat_op_bangunan`.`TGL_PENDATAAN_BNG` AS `TGL_PENDATAAN_BNG`,'' AS `NM_PENDATAAN_OP`,`pbb`.`dat_op_bangunan`.`NIP_PENDATA_BNG` AS `NIP_PENDATA_BNG`,`pbb`.`dat_op_bangunan`.`TGL_PEMERIKSAAN_BNG` AS `TGL_PEMERIKSAAN_BNG`,'' AS `NM_PEMERIKSAAN_OP`,`pbb`.`dat_op_bangunan`.`NIP_PEMERIKSA_BNG` AS `NIP_PEMERIKSA_BNG`,`pbb`.`dat_op_bangunan`.`TGL_PEREKAMAN_BNG` AS `TGL_PEREKAMAN_BNG`, `pbb`.`dat_op_bangunan`.`NIP_PEREKAM_BNG` AS `NIP_PEREKAM_BNG`, `pbb`.`dat_op_bangunan`.`AKTIF` AS `AKTIF` from `pbb`.`dat_op_bangunan`");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS `lspop`");
    }
};
