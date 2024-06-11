<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        DB::statement("SET SESSION sql_mode = ''");

        DB::statement("
    CREATE VIEW njoptkp AS
    SELECT
        dat_subjek_pajak.SUBJEK_PAJAK_ID as subjek_pajak_id,
        sppt.NM_WP_SPPT as NM_WP_SPPT,
        spop.KD_PROPINSI,
        spop.KD_DATI2,
        spop.KD_KECAMATAN,
        spop.KD_KELURAHAN,
        spop.KD_BLOK,
        spop.NO_URUT,
        spop.KD_JNS_OP,
        sppt.NJOPTKP_SPPT as NJOPTKP_SPPT,
        MAX(sppt.NJOP_SPPT) AS max_NJOP_SPPT
    FROM
        sppt
    JOIN spop ON
        spop.KD_PROPINSI = sppt.KD_PROPINSI
        AND spop.KD_DATI2 = sppt.KD_DATI2
        AND spop.KD_KECAMATAN = sppt.KD_KECAMATAN
        AND spop.KD_KELURAHAN = sppt.KD_KELURAHAN
        AND spop.KD_BLOK = sppt.KD_BLOK
        AND spop.NO_URUT = sppt.NO_URUT
        AND spop.KD_JNS_OP = sppt.KD_JNS_OP
    JOIN dat_subjek_pajak ON
        dat_subjek_pajak.SUBJEK_PAJAK_ID = spop.SUBJEK_PAJAK_ID
    GROUP BY
        sppt.NM_WP_SPPT, dat_subjek_pajak.SUBJEK_PAJAK_ID,
        spop.KD_PROPINSI, spop.KD_DATI2, spop.KD_KECAMATAN, spop.KD_KELURAHAN,
        spop.KD_BLOK, spop.NO_URUT, spop.KD_JNS_OP, sppt.NJOPTKP_SPPT
");

        // Reset SQL_MODE to its default after creating the view
        DB::statement("SET SESSION sql_mode = 'ONLY_FULL_GROUP_BY'");
    }

    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS njoptkp");
    }
};
