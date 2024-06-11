<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sppt', function (Blueprint $table) {
            $table->string('KD_PROPINSI', 2);
            $table->string('KD_DATI2', 2);
            $table->string('KD_KECAMATAN', 3);
            $table->string('KD_KELURAHAN', 3);
            $table->string('KD_BLOK', 3);
            $table->string('NO_URUT', 4);
            $table->string('KD_JNS_OP', 1);
            $table->string('THN_PAJAK_SPPT', 4)->index('THN_PAJAK_SPPT');
            $table->tinyInteger('SIKLUS_SPPT')->nullable();
            $table->string('KD_KANWIL_BANK', 2)->nullable();
            $table->string('KD_KPPBB_BANK', 2)->nullable();
            $table->string('KD_BANK_TUNGGAL', 2)->nullable();
            $table->string('KD_BANK_PERSEPSI', 2)->nullable();
            $table->string('KD_TP', 2)->nullable();
            $table->string('NM_WP_SPPT', 30)->nullable();
            $table->string('JLN_WP_SPPT', 30)->nullable();
            $table->string('BLOK_KAV_NO_WP_SPPT', 15)->nullable();
            $table->string('RW_WP_SPPT', 2)->nullable();
            $table->string('RT_WP_SPPT', 3)->nullable();
            $table->string('KELURAHAN_WP_SPPT', 30)->nullable();
            $table->string('KOTA_WP_SPPT', 30)->nullable();
            $table->string('KD_POS_WP_SPPT', 5)->nullable();
            $table->string('NPWP_SPPT', 15)->nullable();
            $table->string('NO_PERSIL_SPPT', 5)->nullable();
            $table->string('KD_KLS_TANAH', 3)->nullable();
            $table->year('THN_AWAL_KLS_TANAH')->nullable()->default('2000');
            $table->string('KD_KLS_BNG', 3)->nullable();
            $table->year('THN_AWAL_KLS_BNG')->nullable()->default('2000');
            $table->date('TGL_JATUH_TEMPO_SPPT')->nullable();
            $table->bigInteger('LUAS_BUMI_SPPT')->default(0);
            $table->bigInteger('LUAS_BNG_SPPT')->default(0);
            $table->bigInteger('NJOP_BUMI_SPPT')->default(0);
            $table->bigInteger('NJOP_BNG_SPPT')->default(0);
            $table->bigInteger('NJOP_SPPT')->default(0);
            $table->integer('NJOPTKP_SPPT')->default(0);
            $table->bigInteger('NJKP_SPPT')->default(0);
            $table->bigInteger('PBB_TERHUTANG_SPPT')->default(0);
            $table->bigInteger('FAKTOR_PENGURANG_SPPT')->default(0);
            $table->bigInteger('PBB_YG_HARUS_DIBAYAR_SPPT')->default(0);
            $table->boolean('STATUS_PEMBAYARAN_SPPT')->nullable()->default(false)->index('STATUS_PEMBAYARAN');
            $table->boolean('STATUS_TAGIHAN_SPPT')->nullable()->default(false);
            $table->boolean('STATUS_CETAK_SPPT')->nullable()->default(false);
            $table->dateTime('TGL_TERBIT_SPPT')->nullable();
            $table->dateTime('TGL_CETAK_SPPT')->nullable();
            $table->string('NIP_PENCETAK_SPPT', 20)->nullable();

            $table->primary(['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP', 'THN_PAJAK_SPPT']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sppt');
    }
};
