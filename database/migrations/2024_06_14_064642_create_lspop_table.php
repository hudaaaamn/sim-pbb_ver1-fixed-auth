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
    public function up(): void
    {
        Schema::create('lspop', function (Blueprint $table) {
            $table->id();
            $table->string('nop');
            $table->string('tgl_kunjungan_kembali');
            $table->string('jenis_transaksi');
            $table->string('nomor_formulir');
            $table->string('bgn_total');
            $table->string('bgn_tgl_pendataan');
            $table->string('bgn_individual');
            $table->string('bgn_nip_pendata');
            $table->string('bgn_luas');
            $table->string('bgn_kontruksi');
            $table->string('bgn_dinding');
            $table->string('bgn_jml_lantai');
            $table->string('bgn_langit_langit');
            $table->string('bgn_lantai');
            $table->string('bgn_kondisi');
            $table->string('bgn_atap');
            $table->string('bgn_listrik');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lspop');
    }
};
