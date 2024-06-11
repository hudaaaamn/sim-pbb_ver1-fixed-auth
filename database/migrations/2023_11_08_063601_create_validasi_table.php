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
        Schema::create('validasi', function (Blueprint $table) {
            $table->char('KD_PROPINSI', 2)->nullable();
            $table->char('KD_DATI2', 2)->nullable();
            $table->char('KD_KECAMATAN', 3)->nullable();
            $table->char('KD_KELURAHAN', 3)->nullable();
            $table->char('KD_BLOK', 3)->nullable();
            $table->char('NO_URUT', 4)->nullable();
            $table->char('KD_JNS_OP', 1)->nullable();
            $table->string('NM_WP_SPPT')->nullable();
            $table->text('KETERANGAN')->nullable();
            $table->text('TINDAK_LANJUT')->nullable();
            $table->boolean('IS_CETAK')->nullable();
            $table->boolean('IS_VALIDATED')->nullable();
            $table->string('KELOMPOK', 50)->nullable();
            $table->integer('KATEGORI');
            $table->integer('VALIDASI_KE');
            $table->bigInteger('PBB')->nullable();
            $table->timestamp('MODIFIED')->useCurrentOnUpdate()->useCurrent();
            $table->string('JENIS', 100)->nullable();
            $table->year('THN_TERAKHIR')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('validasi');
    }
};
