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
        Schema::create('pelayanan', function (Blueprint $table) {
            $table->bigInteger('ID');
            $table->string('NAMA_PEMOHON', 300)->nullable();
            $table->string('ALAMAT_PEMOHON', 500)->nullable();
            $table->string('LETAK_OP', 250)->nullable();
            $table->string('KECAMATAN', 250)->nullable();
            $table->string('KELURAHAN', 250)->nullable();
            $table->string('NO_PELAYANAN', 13)->nullable();
            $table->date('TANGGAL_PELAYANAN')->nullable();
            $table->string('KD_PROPINSI', 2)->nullable();
            $table->string('KD_DATI2', 2)->nullable();
            $table->string('KD_KECAMATAN', 3)->nullable();
            $table->string('KD_KELURAHAN', 3)->nullable();
            $table->string('KD_BLOK', 3)->nullable();
            $table->string('NO_URUT', 4)->nullable();
            $table->string('KD_JNS_OP', 1)->nullable();
            $table->char('KD_JNS_PELAYANAN', 2)->nullable();
            $table->date('TANGGAL_PERKIRAAN_SELESAI')->nullable();
            $table->smallInteger('STATUS_PELAYANAN')->nullable();
            $table->string('NIP_PETUGAS_PENERIMA', 300)->nullable();
            $table->string('NAMA_PETUGAS_PENERIMA', 300)->nullable();
            $table->string('NIP_AR', 300)->nullable();
            $table->string('NAMA_AR', 300)->nullable();
            $table->text('CATATAN')->nullable();
            $table->text('KETERANGAN')->nullable();
            $table->dateTime('TGL_MASUK_PENILAI')->nullable();
            $table->string('NIP_MASUK_PENILAI', 300)->nullable();
            $table->dateTime('TGL_SELESAI')->nullable();
            $table->string('NIP_SELESAI', 300)->nullable();
            $table->dateTime('TGL_TERKONFIRMASI_WP')->nullable();
            $table->string('NIP_TERKONFIRMASI_WP', 300)->nullable();
            $table->dateTime('TGL_PENETAPAN')->nullable();
            $table->string('NIP_PENETAPAN', 300)->nullable();
            $table->dateTime('TGL_BERKAS_DITUNDA')->nullable();
            $table->string('NIP_BERKAS_DITUNDA', 300)->nullable();
            $table->string('TTD_JABATAN_KIRI', 500)->nullable();
            $table->string('TTD_NAMA_KIRI', 500)->nullable();
            $table->string('TTD_NIP_KIRI', 500)->nullable();
            $table->string('TTD_JABATAN_KANAN', 500)->nullable();
            $table->string('TTD_NAMA_KANAN', 500)->nullable();
            $table->string('TTD_NIP_KANAN', 500)->nullable();
            $table->text('KETERANGAN_BERKAS')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pelayanan');
    }
};
