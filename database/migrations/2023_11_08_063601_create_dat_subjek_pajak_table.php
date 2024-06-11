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
        Schema::create('dat_subjek_pajak', function (Blueprint $table) {
            $table->string('SUBJEK_PAJAK_ID', 30)->primary();
            $table->string('NM_WP', 30);
            $table->string('JALAN_WP', 30);
            $table->string('BLOK_KAV_NO_WP', 15)->nullable();
            $table->string('RW_WP', 2)->nullable();
            $table->string('RT_WP', 3)->nullable();
            $table->string('KELURAHAN_WP', 30)->nullable();
            $table->string('KOTA_WP', 30)->nullable();
            $table->string('KD_POS_WP', 5)->nullable();
            $table->string('TELP_WP', 20)->nullable();
            $table->string('NPWP', 15)->nullable();
            $table->string('STATUS_PEKERJAAN_WP', 1);
            $table->string('EMAIL_WP', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dat_subjek_pajak');
    }
};
