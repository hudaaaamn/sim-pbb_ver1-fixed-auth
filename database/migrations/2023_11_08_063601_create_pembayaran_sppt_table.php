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
        Schema::create('pembayaran_sppt', function (Blueprint $table) {
            $table->string('KD_PROPINSI', 2);
            $table->string('KD_DATI2', 2);
            $table->string('KD_KECAMATAN', 3);
            $table->string('KD_KELURAHAN', 3);
            $table->string('KD_BLOK', 3);
            $table->string('NO_URUT', 4);
            $table->string('KD_JNS_OP', 1);
            $table->string('THN_PAJAK_SPPT', 4)->index('THN_PAJAK_SPPT');
            $table->tinyInteger('PEMBAYARAN_SPPT_KE');
            $table->string('KD_KANWIL_BANK', 2);
            $table->string('KD_KPPBB_BANK', 2);
            $table->string('KD_BANK_TUNGGAL', 2);
            $table->string('KD_BANK_PERSEPSI', 2);
            $table->string('KD_TP', 2);
            $table->bigInteger('DENDA_SPPT')->nullable();
            $table->bigInteger('JML_SPPT_YG_DIBAYAR');
            $table->date('TGL_PEMBAYARAN_SPPT')->nullable()->index('TGL_PEMBAYARAN_SPPT');
            $table->dateTime('TGL_REKAM_BYR_SPPT');
            $table->string('NIP_REKAM_BYR_SPPT', 15);
            $table->string('NO_BUKTI', 50)->nullable();

            $table->primary(['KD_PROPINSI', 'KD_DATI2', 'KD_KECAMATAN', 'KD_KELURAHAN', 'KD_BLOK', 'NO_URUT', 'KD_JNS_OP', 'THN_PAJAK_SPPT', 'PEMBAYARAN_SPPT_KE', 'KD_KANWIL_BANK', 'KD_KPPBB_BANK', 'KD_BANK_TUNGGAL', 'KD_BANK_PERSEPSI', 'KD_TP']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembayaran_sppt');
    }
};
