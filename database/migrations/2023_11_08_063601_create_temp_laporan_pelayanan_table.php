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
        Schema::create('temp_laporan_pelayanan', function (Blueprint $table) {
            $table->string('NO_PELAYANAN', 13)->nullable();
            $table->string('KD', 20)->nullable();
            $table->text('KETERANGAN')->nullable();
            $table->text('CATATAN')->nullable();
            $table->date('TGL')->nullable();
            $table->string('NAMA_SEBELUM', 50)->nullable();
            $table->string('NOP_SEBELUM', 24)->nullable();
            $table->bigInteger('LT_SEBELUM')->nullable();
            $table->bigInteger('LB_SEBELUM')->nullable();
            $table->bigInteger('KETETAPAN_LAMA')->nullable();
            $table->string('NAMA_BARU', 30)->nullable();
            $table->string('NOP_BARU', 24)->nullable();
            $table->bigInteger('LT_BARU')->nullable();
            $table->bigInteger('LB_BARU')->nullable();
            $table->bigInteger('KETETAPAN_BARU')->nullable();
            $table->bigInteger('SELISIH_KETETAPAN')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('temp_laporan_pelayanan');
    }
};
