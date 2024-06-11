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
        Schema::create('dhkp', function (Blueprint $table) {
            $table->char('KD_PROPINSI', 2);
            $table->char('KD_DATI2', 2);
            $table->char('KD_KECAMATAN', 3);
            $table->char('KD_KELURAHAN', 3);
            $table->char('KD_BLOK', 3);
            $table->char('NO_URUT', 4);
            $table->char('KD_JNS_OP', 1);
            $table->char('THN_PAJAK_SPPT', 4);
            $table->string('NM_WP_SPPT', 50)->nullable();
            $table->bigInteger('LUAS_BUMI_SPPT')->nullable();
            $table->bigInteger('LUAS_BNG_SPPT')->nullable();
            $table->bigInteger('NJOP_BUMI_SPPT')->nullable();
            $table->bigInteger('NJOP_BNG_SPPT')->nullable();
            $table->bigInteger('NJOPTKP_SPPT')->nullable();
            $table->string('ALAMAT_WP_SPPT', 300)->nullable();
            $table->string('ALAMAT_OP_SPPT', 300)->nullable();
            $table->bigInteger('PBB_TERHUTANG')->nullable();

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
        Schema::dropIfExists('dhkp');
    }
};
