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
        Schema::create('dat_op_bangunan', function (Blueprint $table) {
            $table->char('KD_PROPINSI', 2);
            $table->char('KD_DATI2', 2);
            $table->char('KD_KECAMATAN', 3);
            $table->char('KD_KELURAHAN', 3);
            $table->char('KD_BLOK', 3);
            $table->char('NO_URUT', 4);
            $table->char('KD_JNS_OP', 1);
            $table->integer('NO_BNG');
            $table->char('KD_JPB', 2)->nullable();
            $table->char('NO_FORMULIR_LSPOP', 11)->nullable();
            $table->char('THN_DIBANGUN_BNG', 4)->default('0');
            $table->char('THN_RENOVASI_BNG', 4)->nullable();
            $table->bigInteger('LUAS_BNG')->default(0);
            $table->integer('JML_LANTAI_BNG')->default(1);
            $table->char('KONDISI_BNG', 1)->nullable();
            $table->char('JNS_KONSTRUKSI_BNG', 1)->nullable();
            $table->char('JNS_ATAP_BNG', 1)->nullable();
            $table->char('KD_DINDING', 1)->nullable();
            $table->char('KD_LANTAI', 1)->nullable();
            $table->char('KD_LANGIT_LANGIT', 1)->nullable();
            $table->bigInteger('NILAI_SISTEM_BNG')->default(0);
            $table->char('JNS_TRANSAKSI_BNG', 1)->nullable();
            $table->dateTime('TGL_PENDATAAN_BNG')->nullable();
            $table->char('NIP_PENDATA_BNG', 30)->nullable();
            $table->dateTime('TGL_PEMERIKSAAN_BNG')->nullable();
            $table->char('NIP_PEMERIKSA_BNG', 30)->nullable();
            $table->dateTime('TGL_PEREKAMAN_BNG')->nullable();
            $table->char('NIP_PEREKAM_BNG', 30)->nullable();
            $table->date('TGL_KUNJUNGAN_KEMBALI')->nullable();
            $table->bigInteger('NILAI_INDIVIDU')->default(0);
            $table->boolean('AKTIF')->default(true);

            $table->primary(['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP', 'NO_BNG']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dat_op_bangunan');
    }
};
